<?php

namespace App\Mail\Auth;

use App\Entity\User\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
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
            ->subject(trans('auth.reset_password_confirmation'))
            ->markdown('emails.auth.register.reset-password');
    }
}
