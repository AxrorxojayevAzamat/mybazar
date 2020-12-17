<?php

use App\Entity\Store;
use Illuminate\Database\Seeder;

class StoreMarksTableSeeder extends Seeder
{
    public function run()
    {
        Store::chunk(100, function ($stores) {
            /* @var $store Store */
            foreach ($stores as $store) {
                foreach ($store->products as $product) {
                    $markIds = $product->productMarks()->pluck('mark_id');
                    $count = count($markIds);
                    for ($i = 0; $i < $count; $i++) {
                        $store->storeMarks()->firstOrCreate(['mark_id' => $markIds[$i]]);
                    }
                }
            }
        });
    }
}
