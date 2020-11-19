<?php

namespace App\Providers;

use App\Services\Sms\SmsUz;
use App\Services\Sms\SmsSender;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->singleton(SmsSender::class, function (Application $app) {
            $config = $app->make('config')->get('sms');
            $sendLocal = $config['send_local'];

            if (!is_bool($sendLocal)) {
                throw new \InvalidArgumentException('SEND_LOCAL must be type boolean.');
            }

            switch ($config['driver']) {
                case 'sms.uz':
                    $params = $config['drivers']['sms.uz'];
                    if (empty($params['url'])) {
                        throw new \InvalidArgumentException('Sms URL must be set.');
                    }
                    return new SmsUz($sendLocal, $params['url']);
                default:
                    throw new \InvalidArgumentException('Undefined SMS driver ' . $config['driver']);
            }
        });
    }

}
