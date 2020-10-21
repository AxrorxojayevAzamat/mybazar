<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Shop\CharacteristicGroup;
use Faker\Generator as Faker;

$factory->define(CharacteristicGroup::class, function (Faker $faker) {
    return [
        'name_uz' => $faker->unique()->name,
        'name_ru' => $faker->unique()->name,
        'name_en' => $faker->unique()->name,
        'order' => 1,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
