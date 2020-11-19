<?php


namespace App\Helpers;


class UserHelper
{
    public static function isEmail(string $email): bool
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    public static function isPhoneNumber(string $phoneNumber): bool
    {
        if (/*is_numeric($phoneNumber) && */preg_match('/^\+?998[0-9]{9}$/', $phoneNumber)) {
            return true;
        }

        return false;
    }
}
