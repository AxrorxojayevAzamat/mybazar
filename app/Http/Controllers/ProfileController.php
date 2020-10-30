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
use Illuminate\Http\Response as Respon;
use Illuminate\Http\JsonResponse;
use App\Validators\User\ProfileValidator;

class ProfileController extends Controller
{

    private $sms;
    private $validator;

    public function __construct(SmsSender $sms, ProfileValidator $validator) {
        $this->middleware('can:manage-profile');
        $this->sms       = $sms;
        $this->validator = $validator;
    }

    public function index() {
        $user = Auth::user();

        return view('user.setting', compact('user'));
    }

    public function edit(User $user) {
        $genders = Profile::gendersList();

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

        return redirect()->route('user.profile', $user);
    }

    public function changePassword(Request $request) {
        try {
            $this->validator->validatePassword($request);


            if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
//            // The passwords matches
                return $this->response(Respon::HTTP_BAD_REQUEST, 'error', 'Your current password does not matches with the password you provided. Please try again.');
            }

            if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
//            //Current password and new password are same
                return $this->response(Respon::HTTP_BAD_REQUEST, 'error', 'New Password cannot be same as your current password. Please choose a different password.');
            }
            //Change Password
            $user           = Auth::user();
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            return $this->successResponse('Password changed successfully !');
        } catch (\Exception $e) {
            return json_encode($e->getMessage());
        }
    }

    private function successResponse(string $message, $data = []): JsonResponse {
        return$this->response(Respon::HTTP_OK, $message, $data);
    }

    private function response(int $code, string $message, $data = []): JsonResponse {
        return response()->json([
                    'message' => $message,
                    'data'    => $data,
                        ], $code);
    }

}
