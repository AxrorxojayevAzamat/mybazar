<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Shop\Characteristic;
use Faker\Generator as Faker;

$factory->define(Characteristic::class, function (Faker $faker) {
    $type = $faker->randomKey(Characteristic::typesList());
    $variants = [];
    $count = $faker->numberBetween(2, 5);
    $select = $faker->boolean;
    if ($select) {
        if ($type === Characteristic::TYPE_INTEGER) {
            for ($i = 0; $i < $count; $i++) {
                $variants[$i] = $faker->randomNumber(4);
            }
        } else if ($type === Characteristic::TYPE_FLOAT) {
            for ($i = 0; $i < $count; $i++) {
                $variants[$i] = $faker->randomFloat(2, 1, 9999);
            }
        } else {
            for ($i = 0; $i < $count; $i++) {
                $variants[$i] = $faker->firstName;
            }
        }
    }

    return [
        'name_uz' => $faker->unique()->name,
        'name_ru' => $faker->unique()->name,
        'name_en' => $faker->unique()->name,
        'type' => $type,
        'default' => $variants ? $faker->randomElement($variants) : null,
        'required' => $faker->boolean,
        'variants' => $variants ?: null,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
