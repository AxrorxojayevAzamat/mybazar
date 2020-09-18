<?php

use App\Entity\Blog\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Category::class, 5)->create();
    }
}
