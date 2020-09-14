<?php

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        factory(NewsCategory::class, 5)->create();
    }
}
