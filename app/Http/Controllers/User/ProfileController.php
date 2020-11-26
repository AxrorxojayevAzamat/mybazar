<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Entity\User\Profile;
use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Helpers\JsonHelper;
use App\Http\Requests\User\PhoneVerifyRequest;
use App\Http\Requests\User\PhoneRequest;
use App\Http\Requests\User\PasswordRequest;
use App\Services\Sms\SmsSender;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    private $sms;
    private $service;

    public function __construct(SmsSender $sms, UserService $service)
    {
        $this->middleware('can:manage-profile');
        $this->sms = $sms;
        $this->service = $service;
    }

    public function index()
    {
        $user = Auth::user();
        $genders = Profile::gendersList();

        return view('user.setting', compact('user', 'genders'));
    }

    public function show()
    {
        $user = Auth::user();
        return view('user.show', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user = $this->service->updateProfile($user->id, $request);

        return redirect()->route('user.setting');
    }

    public function changePassword(PasswordRequest $request)
    {
        try {
            return $this->service->changePassword($request);
        } catch (\Exception $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        }
    }

    public function request(PhoneRequest $request)
    {
        try {
            $this->service->request(Auth::id(), $request);
            return JsonHelper::successResponse('Phone verify code send successfully !');
        } catch (\DomainException $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        } catch (\Exception $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        }
    }

    public function verify(PhoneVerifyRequest $request)
    {
        try {
            $this->service->verify(Auth::id(), $request);
            return JsonHelper::successResponse('Phone verified successfully !');
        } catch (\DomainException $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        } catch (\Exception $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        }
    }

    public function requestManagerRole(Request $request)
    {
        try {
            $this->service->requestManagerRole(Auth::id());
            return redirect()->back()->with('success', trans('frontend.manager.requested_successfully'));
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function addEmailShow(Request $request)
    {
        return view('user.add-email');
    }

    public function addPhoneShow(Request $request)
    {
        return view('user.add-phone');
    }

    public function addEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:50',
        ]);

        $email = $request['email'];

        $this->service->addEmail(Auth::id(), $email);

        return redirect()->route('profile.email.verification');
    }

    public function addPhone(Request $request)
    {
        $this->validate($request, [
            'phone' => ['required', 'string', 'regex:/^\+?998[0-9]{9}$/'],
        ]);

        $phone = trim($request['phone'], '+');

        $this->service->addPhone(Auth::id(), $phone);

        return redirect()->route('profile.phone.verification');
    }

    public function phone()
    {
        $session = Session::get('auth');
        if (!$session || !$phone = $session['phone_number']) {
            return redirect()->route('register')->with('error', trans('auth.phone_not_found'));
        }

        return view('auth.verify-phone', compact('phone'));
    }

    public function email()
    {
        $session = Session::get('auth');
        if (!$session || !$email = $session['email']) {
            return redirect()->route('register')->with('error', trans('auth.email_not_found'));
        }

        return view('auth.verify-email', compact('email'));
    }


}
