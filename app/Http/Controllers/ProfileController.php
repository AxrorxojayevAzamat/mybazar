<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Entity\User\Profile;
use App\Entity\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageHelper;
use App\Services\Sms\SmsSender;
use Illuminate\Support\Facades\Hash;
use App\Helpers\JsonHelper;
use App\Services\User\PhoneService;
use App\Http\Requests\User\PhoneVerifyRequest;
use App\Http\Requests\User\PhoneRequest;
use App\Http\Requests\User\PasswordRequest;
use Illuminate\Http\Response;

class ProfileController extends Controller
{

    private $sms;
    private $service;

    public function __construct(SmsSender $sms, PhoneService $service) {
        $this->middleware('can:manage-profile');
        $this->sms     = $sms;
        $this->service = $service;
    }

    public function index() {
        $user    = Auth::user();
        $genders = Profile::gendersList();
        
        return view('user.setting', compact('user', 'genders'));
    }

    public function edit(User $user) {


        return view('user.edit', compact('user', 'genders'));
    }

    public function update(Request $request, User $user) {


        if (!$request->avatar) {
            $user->profile->edit($request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_PROFILES . '/' . $user->id);

            $imageName = ImageHelper::getRandomName($request->avatar);
            $user->profile->edit($request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address, $imageName);

            $this->uploadPoster($user->id, $request->avatar, $imageName);
        }

        return redirect()->route('user.setting');
    }

    public function changePassword(PasswordRequest $request) {
        try {

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
        } catch (\Exception $e) {
            return JsonHelper::response(Response::HTTP_BAD_REQUEST, $e->getMessage());
        }
    }

    public function request(PhoneRequest $request) {
        try {
            $this->service->request(Auth::id(), $request);
            return JsonHelper::successResponse('Phone verify code send successfully !');
        } catch (\Exception $e) {
            return JsonHelper::response(Response::HTTP_BAD_REQUEST, $e->getMessage());
        } catch (\DomainException $e) {
            return JsonHelper::response(Response::HTTP_BAD_REQUEST, $e->getMessage());
        }
    }

    public function verify(PhoneVerifyRequest $request) {
        try {
            $this->service->verify(Auth::id(), $request);
            return JsonHelper::successResponse('Phone verified successfully !');
        } catch (\Exception $e) {
            return JsonHelper::response(Response::HTTP_BAD_REQUEST, $e->getMessage());
        }
    }

}
