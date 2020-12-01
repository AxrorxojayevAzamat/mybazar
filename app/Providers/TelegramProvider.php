<?php


namespace App\Providers;


use SocialiteProviders\Manager\OAuth2\User;
use SocialiteProviders\Telegram\Provider;

class TelegramProvider extends Provider
{
    protected function mapUserToObject(array $user)
    {
        $name = trim(sprintf('%s %s', $user['first_name'] ?? '', $user['last_name'] ?? ''));

        return (new User())->setRaw($user)->map([
            'id'        => $user['id'],
            'nickname'  => $user['username'],
            'name'      => !empty($name) ? $name : null,
            'avatar'    => isset($user['photo_url']) ? $user['photo_url'] : null,
        ]);
    }
}
