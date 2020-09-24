<?php

use App\Entity\Shop\Product;
use Illuminate\Database\Seeder;
use App\Entity\Shop\Category;

class ProductCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::where('parent_id', '!=', null)->get();
        $categoryIds = [];
        $i = 0;
        foreach ($categories as $category) {
            /* @var $category Category */
            if (!$category->children()->exists()) {
                $categoryIds[$i++] = $category->id;
            }
        }

        Product::chunk(100, function ($products) use ($categoryIds) {
            /* @var $product Product */
            foreach ($products as $product) {
                $categories = $categoryIds;
                $count = random_int(1, 3);
                for ($i = 0; $i < $count; $i++) {
                    $key = array_rand($categories);
                    $product->productCategories()->create(['category_id' => $categories[$key]]);
                    unset($categories[$key]);
                }
                $product->update(['main_category_id' => array_rand($categories)]);
            }
        });
    }
}
