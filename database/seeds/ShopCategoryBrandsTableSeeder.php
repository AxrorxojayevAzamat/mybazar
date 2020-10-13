<?php

use Illuminate\Database\Seeder;
use App\Entity\Category;

class ShopCategoryBrandsTableSeeder extends Seeder
{
    public function run()
    {
        Category::where('parent_id', '!=', null)->chunk(100, function ($categories) {
            /* @var $category Category */
            foreach ($categories as $category) {
                if (!$category->children()->exists()) {
                    $brands = $category->mainProducts()->pluck('brand_id')->toArray();
                    foreach ($brands as $brandId) {
                        $category->categoryBrands()->firstOrCreate(['brand_id' => $brandId]);
                    }

                }
            }
        });

    }
}
