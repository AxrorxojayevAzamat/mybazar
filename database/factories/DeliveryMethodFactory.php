<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\DeliveryMethod;
use Faker\Generator as Faker;

$factory->define(DeliveryMethod::class, function (Faker $faker) {
    return [
        'name_uz' => $faker->unique()->name,
        'name_ru' => $faker->unique()->name,
        'name_en' => $faker->unique()->name,
        'description_uz' => $faker->text(200),
        'description_ru' => $faker->text(200),
        'description_en' => $faker->text(200),
        'cost' => round($faker->randomNumber(5), -2),
        'min_weight' => $faker->randomFloat(2, 0, 2),
        'max_weight' => $faker->randomFloat(2, 0, 99),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
