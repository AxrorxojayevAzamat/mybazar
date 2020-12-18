<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Shop\Modification;
use Faker\Generator as Faker;

$factory->define(Modification::class, function (Faker $faker) {
    $price = round($faker->randomNumber(5), -2);

    return [
        'name_uz' => $faker->unique()->firstName,
        'name_ru' => $faker->unique()->firstName,
        'name_en' => $faker->unique()->firstName,
        'code' => $faker->unique()->isbn10,
        'price_uzs' => $price,
        'price_usd' => round($price / 10000, 2),
        'value' => $faker->numberBetween(1, 9999),
        'photo' => null,
        'sort' => $faker->numberBetween(1, 100),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
