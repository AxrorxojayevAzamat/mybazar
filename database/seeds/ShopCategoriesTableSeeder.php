<?php

use App\Entity\Shop\Category;
use Illuminate\Database\Seeder;

class ShopCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Category::class, 10)->create()->each(function(Category $category) {
            $counts = [3, random_int(4, 7)];
            $category->children()->saveMany(factory(Category::class, $counts[array_rand($counts)])->create()->each(function(Category $category) {
                $counts = [3, random_int(4, 7)];
                $category->children()->saveMany(factory(Category::class, $counts[array_rand($counts)])->create());
            }));
        });
    }
}
