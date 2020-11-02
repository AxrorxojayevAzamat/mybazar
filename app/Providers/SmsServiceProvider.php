<?php

namespace App\Providers;

use App\Services\Sms\SmsUz;
use App\Services\Sms\SmsSender;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Other\Space;

class SmsServiceProvider extends ServiceProvider
{

    public function register(): void {
        $this->app->singleton(SmsSender::class, function (Application $app) {
            $config    = $app->make('config')->get('sms');
            $sendLocal = $config['send_local'];

            if ($sendLocal === '' || $sendLocal === ' ') {
                throw new \InvalidArgumentException('Sms SEND_LOCAL must be set.');
            }

            if (!is_bool($sendLocal)) {
                throw new \InvalidArgumentException('SEND_LOCAL must be type boolean.');
            }

            switch ($config['driver']) {
                case 'sms.uz':
                    $params = $config['drivers']['sms.uz'];
                    if (!empty($params['url'])) {
                        return new SmsUz($sendLocal, $params['url']);
                    }

                default:
                    throw new \InvalidArgumentException('Undefined SMS driver ' . $config['driver']);
            }
        });
    }

}
