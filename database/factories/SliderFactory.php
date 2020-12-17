<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    

    return [
        'url' => $faker->unique()->url,
        'sort' => $faker->numberBetween(1, 100),
        'file'=> $faker->imageUrl(),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
