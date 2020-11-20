<?php

namespace App\Services\Auth;

use App\Entity\User\User;
use App\Helpers\UserHelper;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\Auth\ResetPasswordMail;
use App\Mail\Auth\VerifyMail;
use App\Services\Sms\SmsSender;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ResetPasswordService
{
    private $sms;
    private $dispatcher;

    public function __construct(SmsSender $sms, Dispatcher $dispatcher)
    {
        $this->sms = $sms;
        $this->dispatcher = $dispatcher;
    }

    public function requestResetPassword(int $id, string $emailOrPhone): void
    {
        $user = User::findOrFail($id);

        if (UserHelper::isEmail($emailOrPhone)) {
            $user->requestEmailVerification();
            Session::put('auth', ['email' => $user->email]);
            Mail::to($user->email)->send(new ResetPasswordMail($user));
        } elseif (UserHelper::isPhoneNumber($emailOrPhone)) {
            $user->requestPhoneVerification();
            Session::put('auth', ['phone_number' => $user->phone, 'token' => $user->phone_verify_token]);
            $this->sms->send($user->phone, $user->phone_verify_token);
        }
    }
}
