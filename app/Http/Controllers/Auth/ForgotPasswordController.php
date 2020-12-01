<?php

namespace App\Http\Controllers\Auth;

use App\Entity\User\User;
use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Services\Auth\ResetPasswordService;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    private $service;

    public function __construct(ResetPasswordService $service)
    {
        $this->service = $service;
    }

    public function resetRequest(Request $request)
    {
        $request->validate(['email_or_phone' => 'required|string|max:255']);
        $emailOrPhone = $request['email_or_phone'];

        $user = User::where(function ($query) use ($emailOrPhone) {
            $query->where('email', $emailOrPhone)
                ->orWhere('phone', trim($emailOrPhone, '+'));
        })->first();

        if (!$user) {
            return redirect()->back()->with('error', trans('auth.user_not_found'));
        }

        $this->service->requestResetPassword($user->id, $emailOrPhone);

        if (UserHelper::isEmail($emailOrPhone)) {
            return redirect()->route('password.reset.email');
        }

        return redirect()->route('password.reset');
    }

    public function resetEmail()
    {
        $session = Session::get('auth');
        if (!$session || !$email = $session['email']) {
            return redirect()->route('register')->with('success', trans('auth.email_not_found'));
        }

        return view('auth.passwords.reset-email', compact('email'));
    }
}
