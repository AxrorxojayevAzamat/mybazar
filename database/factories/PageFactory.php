<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'title_uz'=> $faker->unique()->name,
        'title_ru'=> $faker->unique()->name,
        'title_en'=> $faker->unique()->name,
        'menu_title_uz'=> $faker->unique()->name,
        'menu_title_ru'=> $faker->unique()->name,
        'menu_title_en'=> $faker->unique()->name,
        'slug' => $faker->unique()->slug(2),
        'description_uz'=> $faker->text(200),
        'description_ru'=> $faker->text(200),
        'description_en'=> $faker->text(200),
        'body_uz'=> $faker->text(500),
        'body_ru'=> $faker->text(500),
        'body_en'=> $faker->text(500),
        'parent_id' => null,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
