<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Brand;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Helpers\ProductHelper;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $storesCount = Store::count();
    $brandCount = Brand::count();
    $price = $faker->randomNumber(5);

    return [
        'name_uz' => $faker->unique()->name,
        'name_ru' => $faker->unique()->name,
        'name_en' => $faker->unique()->name,
        'description_uz' => $faker->text(200),
        'description_ru' => $faker->text(200),
        'description_en' => $faker->text(200),
        'slug' => $faker->unique()->slug(10),
        'price_uzs' => $price,
        'price_usd' => round($price / 9500, 2),
        'discount' => $faker->randomFloat(1, 0, 1),
        'store_id' => $faker->numberBetween(1, $storesCount),
        'brand_id' => $faker->numberBetween(1, $brandCount),
        'status' => $faker->randomElement(array_keys(ProductHelper::getStatusList())),
        'weight' => $faker->boolean ? $faker->randomFloat(2, 0, 99) : null,
        'quantity' => $faker->boolean ? $faker->randomNumber(5) : null,
        'guarantee' => $faker->boolean,
        'bestseller' => $faker->boolean,
        'new' => $faker->boolean,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
