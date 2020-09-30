<?php

use Illuminate\Database\Seeder;
use App\Entity\Shop\Value;
use App\Entity\Shop\ProductCategory;
use App\Entity\Shop\Characteristic;

class ShopValuesTableSeeder extends Seeder {

    public function run() {
        
        $productCategories = ProductCategory::get();
        $value = null;
        foreach ($productCategories as $productCategory) {
            foreach ($productCategory->category->characteristics as $characteristic) {
                $type = $characteristic->type;

                if ($type === Characteristic::TYPE_INTEGER) {
                    $value = random_int(1, 4);
                } else if ($type === Characteristic::TYPE_FLOAT) {
                    $value = random_int(11, 23) / 10;
                } else {
                    $value = uniqid();
                }

                Value::create([
                    'product_id' => $productCategory->product_id,
                    'characteristic_id' => $characteristic->id,
                    'value' => $value ? $value : null,
                    'main' => array_rand([true, false]),
                    'sort' => random_int(1, 100),
                ]);
            }
        }
    }

}
