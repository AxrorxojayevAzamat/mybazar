<?php

use App\Entity\Shop\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class, 50)->create();
    }
}
