<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Blog\News;
use App\Entity\Category;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    $categoryIds = Category::orderByDesc('id')->pluck('id')->toArray();

    return [
        'title_ru'=> $faker->unique()->name,
        'title_en'=> $faker->unique()->name,
        'title_uz'=> $faker->unique()->name,
        'body_en'=> $faker->unique()->name,
        'body_ru'=> $faker->unique()->name,
        'body_uz'=> $faker->unique()->name,
        'description_uz'=> $faker->unique()->name,
        'description_en'=> $faker->unique()->name,
        'description_ru'=> $faker->unique()->name,
        'category_id'=> $faker->randomElement($categoryIds),
        'is_published'=> $faker->randomElement([true, false]),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
