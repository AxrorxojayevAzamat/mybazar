<?php

use App\Entity\Shop\Characteristic;
use Illuminate\Database\Seeder;
use App\Entity\Shop\Category;

class ShopCharacteristicCategoriesTableSeeder extends Seeder
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

        Characteristic::chunk(100, function ($characteristics) use ($categoryIds) {
            /* @var $characteristic Characteristic */
            foreach ($characteristics as $characteristic) {
                $categories = $categoryIds;
                $count = random_int(1, 3);
                for ($i = 0; $i < $count; $i++) {
                    $key = array_rand($categories);
                    $characteristic->characteristicCategories()->create(['category_id' => $categories[$key]]);
                    unset($categories[$key]);
                }
            }
        });
    }
}
