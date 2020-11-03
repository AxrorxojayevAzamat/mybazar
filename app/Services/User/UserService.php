<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Response;
use App\Entity\User\User;
use App\Entity\User\Profile;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Http\Requests\User\PasswordRequest;
use App\Http\Requests\User\PhoneVerifyRequest;
use App\Http\Requests\User\PhoneRequest;
use App\Helpers\JsonHelper;
use App\Services\Sms\SmsSender;
use App\Helpers\ImageHelper;
use Carbon\Carbon;
use Config;

class UserService
{

    private $sms;

    public function __construct(SmsSender $sms) {
        $this->sms = $sms;
    }

    public function request($id, PhoneRequest $request) {
        $user = $this->getUser($id);

        $user->requestPhoneVerification(Carbon::now(), $request['phone']);
        config('sms.send_local') ? '' : $this->sms->send($request['phone'], 'Phone verification token: ');
    }

    public function verify($id, PhoneVerifyRequest $request) {
        $user = $this->getUser($id);
        $user->verifyPhone($request['phone_verify_token'], Carbon::now(), $request['phone']);
    }

    public function toggleAuth($id): bool {
        $user = $this->getUser($id);
        if ($user->isPhoneAuthEnabled()) {
            $user->disablePhoneAuth();
        } else {
            $user->enablePhoneAuth();
        }
        return $user->isPhoneAuthEnabled();
    }

    public function findUsers(Request $request) {
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

    public function store(CreateRequest $request) {
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

    public function update($id, UpdateRequest $request) {
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

    public function updateProfile($id, UpdateRequest $request): void {
        /** @var User $user */
        $user = User::findOrFail($id);

        if (!$request->avatar) {
            $user->profile->edit($request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_PROFILES . '/' . $user->id);

            $imageName = ImageHelper::getRandomName($request->avatar);
            $user->profile->edit($request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address, $imageName);

            $this->uploadAvatar($user->id, $request->avatar, $imageName);
        }
    }

    public function changePassword(PasswordRequest $request) {


        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
//            // The passwords matches
            return JsonHelper::response(Response::HTTP_BAD_REQUEST, 'Your current password does not matches with the password you provided. Please try again.');
        }

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
//            //Current password and new password are same

            return JsonHelper::response(Response::HTTP_BAD_REQUEST, 'New Password cannot be same as your current password. Please choose a different password.');
        }
        //Change Password
        $user           = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return JsonHelper::successResponse('Password changed successfully !');
    }

    private function uploadAvatar(int $userId, UploadedFile $file, string $imageName): void {
        ImageHelper::saveThumbnail($userId, ImageHelper::FOLDER_PROFILES, $file, $imageName);
        ImageHelper::saveOriginal($userId, ImageHelper::FOLDER_PROFILES, $file, $imageName);
    }

    private function isProfile(CreateRequest $request): bool {
        $count = 0;
        $request['first_name'] ? $count++ : 0;
        $request['last_name'] ? $count++ : 0;
        $request['birth_date'] ? $count++ : 0;
        $request['gender'] != Profile::GENDER_EMPTY ? $count++ : 0;
        $request['address'] ? $count++ : 0;
        $request['avatar'] ? $count++ : 0;
        return $count;
    }

    private function getUser($id): User {
        return User::findOrFail($id);
    }

}
