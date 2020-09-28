<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Shop\Modification;
use Faker\Generator as Faker;

$factory->define(Modification::class, function (Faker $faker) {
    $type = $faker->randomElement([Modification::TYPE_VALUE, Modification::TYPE_COLOR]);
    $price = round($faker->randomNumber(5), -2);

    return [
        'name_uz' => $faker->unique()->firstName,
        'name_ru' => $faker->unique()->firstName,
        'name_en' => $faker->unique()->firstName,
        'code' => $faker->unique()->isbn10,
        'price_uzs' => $price,
        'price_usd' => round($price / 9500, 2),
        'type' => $type,
        'value' => $type === Modification::TYPE_VALUE ? $faker->numberBetween(1, 9999) : null,
        'color' => $type === Modification::TYPE_COLOR ? $faker->hexColor : null,
        'photo' => null,
        'sort' => $faker->numberBetween(1, 100),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
