<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        SocialiteWasCalled::class => [
            // ... other providers
            'SocialiteProviders\\Telegram\\TelegramExtendSocialite@handle',
        ],
//        Registered::class => [
//            SendEmailVerificationNotification::class,
//        ],
    ];

    public function boot()
    {
        parent::boot();

        //
    }
}
