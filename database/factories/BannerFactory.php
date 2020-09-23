<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Banner;
use App\Entity\Blog\Category;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {
    

    return [
        'title_ru'=> $faker->unique()->name,
        'title_en'=> $faker->unique()->name,
        'title_uz'=> $faker->unique()->name,
        'description_uz'=> $faker->unique()->name,
        'description_en'=> $faker->unique()->name,
        'description_ru'=> $faker->unique()->name,
        'url' => $faker->unique()->url,
        'slug' => $faker->unique()->slug(5),
        'is_published'=> $faker->randomElement([true, false]),
        'file'=> $faker->imageUrl(),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
