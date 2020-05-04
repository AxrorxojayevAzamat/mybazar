<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ShopCategoriesTableSeeder::class);
         $this->call(BrandsTableSeeder::class);
         $this->call(StoresTableSeeder::class);
         $this->call(ProductsTableSeeder::class);
         $this->call(ProductCategoriesTableSeeder::class);
    }
}
