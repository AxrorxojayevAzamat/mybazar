<?php

use App\Entity\Shop\Modification;
use App\Entity\Shop\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class, 50)->create()->each(function (Product $product) {
            $product->modifications()->saveMany(factory(Modification::class, random_int(0, 5))->make());
        });
    }
}
