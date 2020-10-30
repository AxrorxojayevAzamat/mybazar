<?php

return [
    // "sms.uz"
    'driver' => env('SMS_DRIVER', 'sms.uz'),
    'send_local' => env('SMS_SEND_LOCAL'),

    'drivers' => [
        'sms.uz' => [
            'url' => env('SMS_SMS_UZ_APP_URL'),
        ],
    ],
];