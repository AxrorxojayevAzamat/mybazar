<?php

use App\Entity\Blog\Category;
use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Category::class, 20)->create();
    }
}
