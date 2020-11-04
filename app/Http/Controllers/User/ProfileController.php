<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Entity\User\Profile;
use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stores\Users\UpdateRequest;
use App\Helpers\JsonHelper;
use App\Http\Requests\User\PhoneVerifyRequest;
use App\Http\Requests\User\PhoneRequest;
use App\Http\Requests\User\PasswordRequest;
use App\Services\Sms\SmsSender;
use App\Services\User\UserService;

class ProfileController extends Controller
{

    private $sms;
    private $service;

    public function __construct(SmsSender $sms, UserService $service) {
        $this->middleware('can:manage-profile');
        $this->sms     = $sms;
        $this->service = $service;
    }

    public function index() {
        $user    = Auth::user();
        $genders = Profile::gendersList();

        return view('user.setting', compact('user', 'genders'));
    }

    public function update(UpdateRequest $request, User $user) {
        $user = $this->service->updateProfile($user->id, $request);

        return redirect()->route('user.setting');
    }

    public function changePassword(PasswordRequest $request) {
        try {
            return $this->service->changePassword($request);
        } catch (\Exception $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        }
    }

    public function request(PhoneRequest $request) {
        try {
            $this->service->request(Auth::id(), $request);
            return JsonHelper::successResponse('Phone verify code send successfully !');
        } catch (\Exception $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        } catch (\DomainException $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        }
    }

    public function verify(PhoneVerifyRequest $request) {
        try {
            $this->service->verify(Auth::id(), $request);
            return JsonHelper::successResponse('Phone verified successfully !');
        } catch (\Exception $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        } catch (\DomainException $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        }
    }

}
