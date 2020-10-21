<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name_uz' => $faker->unique()->name,
        'name_ru' => $faker->unique()->name,
        'name_en' => $faker->unique()->name,
        'description_uz' => $faker->text(200),
        'description_ru' => $faker->text(200),
        'description_en' => $faker->text(200),
        'slug' => $faker->unique()->slug(5),
        'parent_id' => null,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
