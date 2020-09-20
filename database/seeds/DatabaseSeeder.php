<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ShopCategoriesTableSeeder::class);
        $this->call(ShopMarksTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(ShopCharacteristicsTableSeeder::class);
        $this->call(ShopCharacteristicCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductMarksTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(DeliveryMethodsTableSeeder::class);
        $this->call(StorePaymentsTableSeeder::class);
        $this->call(StoreCategoriesTableSeeder::class);
        $this->call(StoreMarksTableSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(StoreDeliveryMethodsTableSeeder::class);
        $this->call(ShopProductReviewsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(NewsCategoriesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(VideosCategoriesTableSeeder::class);
        $this->call(VideosTableSeeder::class);
    }
}
