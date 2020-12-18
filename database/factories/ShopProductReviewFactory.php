<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Shop\ProductReview;
use App\Entity\User\User;
use Faker\Generator as Faker;

$factory->define(ProductReview::class, function (Faker $faker) {
    $userIds = User::where('role', '!=', User::ROLE_ADMIN)->pluck('id')->toArray();

    return [
        'rating' => $faker->numberBetween(1, 5),
        'advantages' => $faker->text(100),
        'disadvantages' => $faker->text(100),
        'comment' => $faker->text(100),
        'user_id' => $faker->randomElement($userIds),
    ];
});
