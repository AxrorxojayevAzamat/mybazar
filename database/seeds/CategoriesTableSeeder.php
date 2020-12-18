<?php

use App\Entity\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Category::class, 10)->create()->each(function(Category $category) {
            $counts = [3, random_int(4, 7)];
            $category->children()->saveMany(factory(Category::class, $counts[array_rand($counts)])->create()->each(function(Category $category) {
                $category->cacheFor = 0;
                $counts = [3, random_int(4, 7)];
                $category->children()->saveMany(factory(Category::class, $counts[array_rand($counts)])->create()->each(function (Category $category) {
                    $category->cacheFor = 0;
                }));
            }));
        });
    }
}
