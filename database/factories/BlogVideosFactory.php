<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Entity\Blog\Video;
use App\Entity\Blog\Category;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    $categoryIds = Category::where('type', Category::VIDEOS)->pluck('id')->toArray();
    return [
        'title_ru' => $faker->sentence,
        'title_en' => $faker->sentence,
        'title_uz' => $faker->sentence,
        'body_en' => $faker->text(100),
        'body_ru' => $faker->text(100),
        'body_uz' => $faker->text(100),
        'description_uz' => $faker->text(200),
        'description_en' => $faker->text(200),
        'description_ru' => $faker->text(200),
        'category_id' => $faker->randomElement($categoryIds),
        'is_published' => $faker->randomElement([true, false]),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
