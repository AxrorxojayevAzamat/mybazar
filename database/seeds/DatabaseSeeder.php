<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ShopMarksTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(ShopCharacteristicGroupsSeeder::class);
        $this->call(ShopCharacteristicsTableSeeder::class);
        $this->call(ShopCharacteristicCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductMarksTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(DeliveryMethodsTableSeeder::class);
        $this->call(StorePaymentsTableSeeder::class);
        $this->call(StoreCategoriesTableSeeder::class);
        $this->call(ShopCategoryBrandsTableSeeder::class);
        $this->call(StoreMarksTableSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(StoreDeliveryMethodsTableSeeder::class);
        $this->call(ShopProductReviewsTableSeeder::class);
        $this->call(BlogPostsTableSeeder::class);
        $this->call(BlogNewsTableSeeder::class);
        $this->call(BlogVideosTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(ShopValuesTableSeeder::class);
        $this->call(DiscountsTableSeeder::class);
        $this->call(ShopProductCharacteristicModificationsSeeder::class);
        $this->call(UserFavoritesTableSeeder::class);
    }
}
