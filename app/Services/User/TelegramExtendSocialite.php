<?php


namespace App\Services\User;


use SocialiteProviders\Manager\SocialiteWasCalled;
use App\Providers\TelegramProvider;

class TelegramExtendSocialite
{
    /**
     * Register the provider.
     *
     * @param \SocialiteProviders\Manager\SocialiteWasCalled $socialiteWasCalled
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('telegram', TelegramProvider::class);
    }
}
