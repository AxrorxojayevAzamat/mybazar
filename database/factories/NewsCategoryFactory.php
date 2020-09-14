<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NewsCategory;
use Faker\Generator as Faker;

$factory->define(NewsCategory::class, function (Faker $faker) {
    return [
        'name_uz' => $faker->unique()->name,
        'name_ru' => $faker->unique()->name,
        'name_en' => $faker->unique()->name,
    ];
});
