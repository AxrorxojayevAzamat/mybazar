<?php

use App\Entity\Store;
use App\Entity\StoreCategory;
use Illuminate\Database\Seeder;

class StoreCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Store::chunk(100, function ($stores) {
            /* @var $store Store */
            foreach ($stores as $store) {
                foreach ($store->products as $product) {
                    $categoryIds = $product->productCategories()->pluck('category_id');
                    $count = count($categoryIds);
                    for ($i = 0; $i < $count; $i++) {
                        $store->storeCategories()->firstOrCreate(['category_id' => $categoryIds[$i]]);
                    }
                }
            }
        });
    }
}
