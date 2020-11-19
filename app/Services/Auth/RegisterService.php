<?php

namespace App\Services\Auth;

use App\Entity\User\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\Auth\VerifyMail;
use App\Services\Sms\SmsSender;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterService
{
    private $sms;
    private $dispatcher;

    public function __construct(SmsSender $sms, Dispatcher $dispatcher)
    {
        $this->sms = $sms;
        $this->dispatcher = $dispatcher;
    }

    public function create(RegisterRequest $request): User
    {
        $user = User::register(
            $request->name,
            $request->email_or_phone,
            $request->password
        );

        if ($user->email) {
            Session::put('auth', ['email' => $user->email]);
            Mail::to($user->email)->send(new VerifyMail($user));
        } else if ($user->phone) {
            Session::put('auth', ['phone_number' => $user->phone]);
            $this->sms->send($user->phone, $user->phone_verify_token);
        }

        return $user;
    }

    public function resendEmail(int $id)
    {
        $user = User::findOrFail($id);
        Session::put('auth', ['email' => $user->email]);
        $user->resendEmail();
        Mail::to($user->email)->send(new VerifyMail($user));
    }

    public function verifyEmail(int $id): void
    {
        $user = User::findOrFail($id);
        $user->verifyMail();
    }

    public function resendPhone(int $id)
    {
        $user = User::findOrFail($id);
        Session::put('auth', ['phone_number' => $user->phone]);
        $user->resendPhone();
        $this->sms->send($user->phone, $user->phone_verify_token);
    }

    public function verifyPhone(int $id, int $token): void
    {
        $user = User::findOrFail($id);

        if ($token !== $user->phone_verify_token) {
            throw new \DomainException(trans('auth.incorrect_verify_token'));
        }

        if ($user->phone_verify_token_expire->lt(Carbon::now())) {
            throw new \DomainException(trans('auth.token_expired'));
        }

        $user->verifyPhone();
    }
}
