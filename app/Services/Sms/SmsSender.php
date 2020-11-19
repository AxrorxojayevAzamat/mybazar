<?php

namespace App\Services\Sms;

interface SmsSender
{
    public function send(int $number, string $text): void;
}
