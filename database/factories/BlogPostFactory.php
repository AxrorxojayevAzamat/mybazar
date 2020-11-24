<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Blog\Post;
use App\Entity\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $categoryIds = Category::orderByDesc('id')->pluck('id')->toArray();

    return [
        'title_uz'=> $faker->unique()->name,
        'title_ru'=> $faker->unique()->name,
        'title_en'=> $faker->unique()->name,
        'description_uz'=> $faker->text(200),
        'description_ru'=> $faker->text(200),
        'description_en'=> $faker->text(200),
        'body_uz'=> $faker->text(500),
        'body_ru'=> $faker->text(500),
        'body_en'=> $faker->text(500),
        'category_id'=> $faker->randomElement($categoryIds),
        'status'=> $faker->randomElement([Post::DRAFT, Post::PUBLISHED]),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
