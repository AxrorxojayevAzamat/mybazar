<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Entity\Discount;
use App\Entity\Category;
use Faker\Generator as Faker;

$factory->define(Discount::class, function (Faker $faker) {
    $categoryIds = Category::orderByDesc('id')->pluck('id')->toArray();

//    $dayOff = Carbon::now()->addDays($faker->numberBetween(2, 9));
//    $maxDayOff = Carbon::now()->addDays($faker->numberBetween(10, 15));
    
    return [
        'name_ru' => $faker->sentence,
        'name_en' => $faker->sentence,
        'name_uz' => $faker->sentence,
        'description_uz' => $faker->text(200),
        'description_en' => $faker->text(200),
        'description_ru' => $faker->text(200),
        'start_date' => $faker->dateTimeBetween('now', '+1 month'),
        'end_date' => $faker->dateTimeBetween('now', '+2 month'),
        'category_id' => $faker->randomElement($categoryIds),
        'common' => $faker->randomElement([true, false]),
        'status' => $faker->randomElement(array_keys(Discount::statusesList())),
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
