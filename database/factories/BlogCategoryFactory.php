<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Blog\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name_uz' => $faker->unique()->name,
        'name_ru' => $faker->unique()->name,
        'name_en' => $faker->unique()->name,
        'type' => $faker->randomElement([Category::NEWS, Category::POSTS, Category::VIDEOS]),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
