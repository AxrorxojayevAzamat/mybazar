<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Shop\Mark;
use Faker\Generator as Faker;

$factory->define(Mark::class, function (Faker $faker) {
    return [
        'name_uz' => $faker->unique()->firstName,
        'name_ru' => $faker->unique()->firstName,
        'name_en' => $faker->unique()->firstName,
        'slug' => $faker->unique()->slug(1),
        'photo' => $faker->imageUrl(),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
