<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Shop\Mark;
use Faker\Generator as Faker;

$factory->define(Mark::class, function (Faker $faker) {
    return [
        'name_uz' => $faker->unique()->name,
        'name_ru' => $faker->unique()->name,
        'name_en' => $faker->unique()->name,
        'slug' => $faker->unique()->slug(2),
        'photo' => $faker->imageUrl(),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
