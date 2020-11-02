<?php

namespace App\Services\User;

use App\Entity\User\User;
use App\Http\Requests\User\PhoneVerifyRequest;
use App\Http\Requests\User\PhoneRequest;
use App\Services\Sms\SmsSender;
use Carbon\Carbon;
use Config;

class PhoneService
{

    private $sms;

    public function __construct(SmsSender $sms) {
        $this->sms = $sms;
    }

    public function request($id, PhoneRequest $request) {
        $user = $this->getUser($id);

        $user->requestPhoneVerification(Carbon::now(),$request['phone']);
        config('sms.send_local') ? '' : $this->sms->send($request['phone'], 'Phone verification token: ');
    }

    public function verify($id, PhoneVerifyRequest $request) {
        $user = $this->getUser($id);
        $user->verifyPhone($request['phone_verify_token'], Carbon::now(),$request['phone']);
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

    private function getUser($id): User {
        return User::findOrFail($id);
    }

}
