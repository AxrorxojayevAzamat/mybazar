<?php

namespace App\Mail\Auth;

use App\Entity\User\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class VerifyMail extends Mailable
{
    use SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this
            ->subject(Auth::guest() ? trans('auth.signup_confirmation') : trans('auth.verify_email'))
            ->markdown('emails.auth.register.verify');
    }
}
