<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'name_uz' => $faker->unique()->firstName,
        'name_ru' => $faker->unique()->firstName,
        'name_en' => $faker->unique()->firstName,
        'logo' => $faker->imageUrl(),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
