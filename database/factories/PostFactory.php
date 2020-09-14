<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $randomdFile = random_int(1, 4);
    $file = 'blog-page'.$randomdFile.'.png';
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
        'user_id'=> 1,
        'category_id'=> random_int(1, 5),
        'is_published'=> $faker->randomElement([true,false]),
        'file'=> $file,
    ];
});
