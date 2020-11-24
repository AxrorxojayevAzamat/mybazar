<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Entity\Blog\Video;
use App\Entity\Category;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    $categoryIds = Category::orderByDesc('id')->pluck('id')->toArray();
    return [
        'title_ru' => $faker->sentence,
        'title_en' => $faker->sentence,
        'title_uz' => $faker->sentence,
        'body_en' => $faker->text(500),
        'body_ru' => $faker->text(500),
        'body_uz' => $faker->text(500),
        'description_uz' => $faker->text(200),
        'description_en' => $faker->text(200),
        'description_ru' => $faker->text(200),
        'category_id' => $faker->randomElement($categoryIds),
        'status'=> $faker->randomElement([Video::DRAFT, Video::PUBLISHED]),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
