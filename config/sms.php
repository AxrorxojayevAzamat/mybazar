<?php

return [
    // "sms.uz"
    'driver' => env('SMS_DRIVER', 'sms.uz'),
    'send_local' => env('SMS_SEND_LOCAL', false),

    'drivers' => [
        'sms.uz' => [
            'url' => env('SMS_SMS_UZ_APP_URL'),
        ],
    ],

    'phone_verify_token_expire' => env('PHONE_VERIFY_TOKEN_EXPIRE',300)
];
