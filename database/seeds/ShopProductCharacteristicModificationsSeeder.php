<?php

use App\Entity\Shop\Modification;
use App\Entity\Shop\Product;
use Illuminate\Database\Seeder;

class ShopProductCharacteristicModificationsSeeder extends Seeder
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
                    $randomTime = $faker->numberBetween(2, 5);
                    for ($i = 0; $i < $randomTime; $i++) {
                        $price = round($faker->randomNumber(5), -2);
                        $modification = $product->modifications()->make([
                            'name_uz' => $characteristic->name_uz,
                            'name_ru' => $characteristic->name_ru,
                            'name_en' => $characteristic->name_en,
                            'code' => $faker->unique()->isbn10,
                            'characteristic_id' => $characteristic->id,
                            'price_uzs' => $price,
                            'price_usd' => round($price / 10000, 2),
                            'type' => Modification::TYPE_CHARACTERISTIC_VALUE,
                            'color' => null,
                            'photo' => null,
                            'sort' => $sort++,
                            'created_by' => 1,
                            'updated_by' => 1,
                        ]);
                        if ($characteristic->isInteger()) {
                            $modification->value = $faker->numberBetween(1, 99999);
                        } elseif ($characteristic->isFloat()) {
                            $modification->value = $faker->randomFloat(2, 1, 9999);
                        } elseif ($characteristic->isString()) {
                            $modification->value = $faker->firstName;
                        } elseif ($characteristic->isSelect()) {
                            $modification->value = $faker->randomElement($characteristic->variants);
                        }
                        $modification->save();
                    }
                }
            }
        });
    }
}
