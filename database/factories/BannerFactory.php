<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Banner;
use Faker\Generator as Faker;
use App\Entity\Category;

$factory->define(Banner::class, function (Faker $faker) {
    $categoryIds = Category::orderByDesc('id')->pluck('id')->toArray();

    return [
        'title_ru'=> $faker->unique()->name,
        'title_en'=> $faker->unique()->name,
        'title_uz'=> $faker->unique()->name,
        'description_uz'=> $faker->text(200),
        'description_en'=> $faker->text(200),
        'description_ru'=> $faker->text(200),
        'url' => $faker->unique()->url,
        'slug' => $faker->unique()->slug(5),
        'category_id'=> $faker->randomElement($categoryIds),
        'status'=> $faker->randomElement([Banner::DRAFT, Banner::PUBLISHED]),
        'file'=> $faker->imageUrl(),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
