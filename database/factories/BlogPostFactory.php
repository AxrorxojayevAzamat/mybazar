<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Blog\Post;
use App\Entity\Blog\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $categoryIds = Category::where('type', Category::POSTS)->pluck('id')->toArray();

    return [
        'title_uz'=> $faker->unique()->name,
        'title_ru'=> $faker->unique()->name,
        'title_en'=> $faker->unique()->name,
        'description_uz'=> $faker->unique()->name,
        'description_ru'=> $faker->unique()->name,
        'description_en'=> $faker->unique()->name,
        'body_uz'=> $faker->unique()->name,
        'body_ru'=> $faker->unique()->name,
        'body_en'=> $faker->unique()->name,
        'category_id'=> $faker->randomElement($categoryIds),
        'is_published'=> $faker->randomElement([true, false]),
        'file'=> $faker->imageUrl(),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
