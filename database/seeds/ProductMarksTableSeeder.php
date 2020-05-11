<?php

use App\Entity\Shop\Mark;
use App\Entity\Shop\Product;
use Illuminate\Database\Seeder;

class ProductMarksTableSeeder extends Seeder
{
    public function run()
    {
        $markIds = Mark::pluck('id')->toArray();

        Product::chunk(100, function ($products) use ($markIds) {
            /* @var $product Product */
            foreach ($products as $product) {
                $payments = $markIds;
                $count = random_int(0, 3);
                for ($i = 0; $i < $count; $i++) {
                    $key = array_rand($payments);
                    $product->productMarks()->create(['mark_id' => $payments[$key]]);
                    unset($payments[$key]);
                }
            }
        });
    }
}
