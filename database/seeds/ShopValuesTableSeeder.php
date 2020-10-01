<?php

use App\Entity\Shop\Product;
use Illuminate\Database\Seeder;
use App\Entity\Shop\Value;
use App\Entity\Shop\ProductCategory;
use App\Entity\Shop\Characteristic;

class ShopValuesTableSeeder extends Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create();

        Product::chunk(50, function ($products) use ($faker) {
            /* @var $product Product */
            foreach ($products as $product) {
                $category = $product->mainCategory;
                $characteristics = $category->characteristics;
                $sort = 1;
                foreach ($characteristics as $characteristic) {
                    if ($characteristic->isInteger()) {
                        $product->values()->create([
                            'characteristic_id' => $characteristic->id,
                            'value' => $faker->numberBetween(1, 99999),
                            'main' => $faker->boolean,
                            'sort' => $sort++,
                        ]);
                    } elseif ($characteristic->isFloat()) {
                        $product->values()->create([
                            'characteristic_id' => $characteristic->id,
                            'value' => $faker->randomFloat(2, 1, 9999),
                            'main' => $faker->boolean,
                            'sort' => $sort++,
                        ]);
                    } elseif ($characteristic->isString()) {
                        $product->values()->create([
                            'characteristic_id' => $characteristic->id,
                            'value' => $faker->firstName,
                            'main' => $faker->boolean,
                            'sort' => $sort++,
                        ]);
                    } elseif ($characteristic->isSelect()) {
                        $product->values()->create([
                            'characteristic_id' => $characteristic->id,
                            'value' => $faker->randomElement($characteristic->variants),
                            'main' => $faker->boolean,
                            'sort' => $sort++,
                        ]);
                    }
                }
            }
        });


//        $productCategories = ProductCategory::get();
//        $value = null;
//        foreach ($productCategories as $productCategory) {
//            foreach ($productCategory->category->characteristics as $characteristic) {
//                $type = $characteristic->type;
//
//                if ($type === Characteristic::TYPE_INTEGER) {
//                    $value = random_int(1, 4);
//                } else if ($type === Characteristic::TYPE_FLOAT) {
//                    $value = random_int(11, 23) / 10;
//                } else {
//                    $value = uniqid();
//                }
//
//                Value::create([
//                    'product_id' => $productCategory->product_id,
//                    'characteristic_id' => $characteristic->id,
//                    'value' => $value ? $value : null,
//                    'main' => array_rand([true, false]),
//                    'sort' => random_int(1, 100),
//                ]);
//            }
//        }
    }

}
