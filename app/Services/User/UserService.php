<?php

namespace App\Services\User;

use App\Mail\Auth\VerifyMail;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Entity\User\User;
use App\Entity\User\Profile;
use App\Entity\UserFavorite;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Http\Requests\User\PasswordRequest;
use App\Http\Requests\User\PhoneVerifyRequest;
use App\Http\Requests\User\PhoneRequest;
use App\Services\Sms\SmsSender;
use App\Helpers\JsonHelper;
use App\Helpers\ImageHelper;
use Carbon\Carbon;
use Config;

class UserService
{

    private $sms;

    public function __construct(SmsSender $sms)
    {
        $this->sms = $sms;
    }

    public function request($id, PhoneRequest $request)
    {
        $user = $this->getUser($id);

        $user->requestPhoneVerification(Carbon::now(), $request['phone']);
        config('sms.send_local') ?: $this->sms->send($request['phone'], 'Phone verification token: ');
    }

    public function verify($id, PhoneVerifyRequest $request)
    {
        $user = $this->getUser($id);
        $user->verifyPhone($request['phone_verify_token'], Carbon::now(), $request['phone']);
    }

    public function toggleAuth($id): bool
    {
        $user = $this->getUser($id);
        if ($user->isPhoneAuthEnabled()) {
            $user->disablePhoneAuth();
        } else {
            $user->enablePhoneAuth();
        }
        return $user->isPhoneAuthEnabled();
    }

    public function findUsers(Request $request)
    {
        /** @var User $user */
        $query = User::orderByDesc('id');

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('email'))) {
            $query->where('email', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }

        if (!empty($value = $request->get('role'))) {
            $query->where('role', $value);
        }
        return $query;
    }

    public function findUsersRequested(Request $request)
    {
        /** @var User $user */
        $query = User::where('manager_request_status', User::MANAGER_REQUESTED)->orderByDesc('updated_at');

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('email'))) {
            $query->where('email', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }

        if (!empty($value = $request->get('role'))) {
            $query->where('role', $value);
        }
        return $query;
    }

    public function store(CreateRequest $request)
    {
        /** @var User $user */
        $user = User::new($request['name'], $request['email'], $request['role'], $request['password']);
        if ($this->isProfile($request)) {
            $imageName = null;
            if ($request->avatar) {
                $imageName = ImageHelper::getRandomName($request->avatar);
                $this->uploadAvatar($user->id, $request->avatar, $imageName);
            }
            Profile::new($user->id, $request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address, $imageName);
        }
        return $user;
    }

    public function update($id, UpdateRequest $request)
    {
        /** @var User $user */
        $user = User::findOrFail($id);

        $user->edit($request->name, $request->email, $request->role, $request->status, $request->password);
        if ($user->profile) {

            $this->updateProfile($user->id, $request);
        } else {
            $imageName = null;
            if ($request->avatar) {
                $imageName = ImageHelper::getRandomName($request->avatar);
                $this->uploadAvatar($user->id, $request->avatar, $imageName);
            }
            Profile::new($user->id, $request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address, $imageName);
        }
        return $user;
    }

    public function updateProfile($id, UpdateRequest $request): User
    {
        $user = User::findOrFail($id);

        if (!$request->avatar) {
            $user->profile->edit($request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_PROFILES . '/' . $user->id);

            $imageName = ImageHelper::getRandomName($request->avatar);
            $user->profile->edit($request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address, $imageName);

            $this->uploadAvatar($user->id, $request->avatar, $imageName);
        }

        return $user;
    }

    public function approveManagerRoleRequest(int $id)
    {
        $user = User::findOrFail($id);
        $user->approveManagerRoleRequest();
    }

    public function changePassword(PasswordRequest $request)
    {


        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
//            // The passwords matches
            return JsonHelper::badResponse('Your current password does not matches with the password you provided. Please try again.');
        }

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
//            //Current password and new password are same

            return JsonHelper::badResponse('New Password cannot be same as your current password. Please choose a different password.');
        }
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return JsonHelper::successResponse('Password changed successfully !');
    }

    private function uploadAvatar(int $userId, UploadedFile $file, string $imageName): void
    {
        ImageHelper::saveThumbnail($userId, ImageHelper::FOLDER_PROFILES, $file, $imageName);
        ImageHelper::saveOriginal($userId, ImageHelper::FOLDER_PROFILES, $file, $imageName);
    }

    private function isProfile(CreateRequest $request): bool
    {
        $count = 0;
        $request['first_name'] ? $count++ : 0;
        $request['last_name'] ? $count++ : 0;
        $request['birth_date'] ? $count++ : 0;
        $request['gender'] != Profile::GENDER_EMPTY ? $count++ : 0;
        $request['address'] ? $count++ : 0;
        $request['avatar'] ? $count++ : 0;
        return $count;
    }

    private function getUser($id): User
    {
        return User::findOrFail($id);
    }

    public function addToFavorite(int $id, Request $request): UserFavorite
    {
        /** @var User $user */
        $user = User::findOrFail($id);
        DB::beginTransaction();
        try {

            $userFavorite = $user->userFavorites()->create(['product_id' => $request->product_id]);
//            $userFavorite = $user->favorites()->attach($request->product_id);

            DB::commit();

            return $userFavorite;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function removeFromFavorite(int $id, Request $request): bool
    {
        /** @var User $user */
        $user = User::findOrFail($id);
        DB::beginTransaction();
        try {
            $userFavorite = $user->favorites()->detach($request->product_id);
            DB::commit();

            return $userFavorite;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function requestManagerRole(int $id)
    {
        $user = User::findOrFail($id);
        $user->requestManagerRole();
    }

    public function addEmail(int $id, string $email)
    {
        $user = User::findOrFail($id);
        $user->requestEmailAddVerification($email);
        Session::put('auth', ['email' => $user->email]);
        Mail::to($user->email)->send(new VerifyMail($user));
    }

    public function addPhone(int $id, string $phone)
    {
        $user = User::findOrFail($id);
        $user->requestPhoneAddVerification($phone);
        Session::put('auth', ['phone' => $user->phone]);
        $this->sms->send($user->phone, $user->phone_verify_token);
    }
}
