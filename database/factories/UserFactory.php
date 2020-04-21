<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\User\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    $active = $faker->boolean;
    $phoneActive = $faker->boolean;
    return [
        'name' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'phone_verified' => $phoneActive,
        'password' => '$2y$10$6Lwc.e9C9tOaSBimWKuMfO4GnNpTYjCOggwwl56rjEHzo4frI0V6m',
//        'balance' => $faker->randomNumber(5),
        'verify_token' => $active ? null : Str::uuid(),
        'phone_verify_token' => $phoneActive ? null : Str::uuid(),
        'phone_verify_token_expire' => $phoneActive ? null : Carbon::now()->addSeconds(300),
        'phone_auth' => false,
        'role' => $active ? $faker->randomElement([User::ROLE_USER, User::ROLE_ADMIN]) : User::ROLE_USER,
        'status' => $active ? User::STATUS_ACTIVE : User::STATUS_WAIT,
        'email_verified_at' => $active ? null : Carbon::now()->addSeconds(300),
        'remember_token' => Str::random(10),
    ];
});
