<?php

use App\Models\VideosCategory;
use Illuminate\Database\Seeder;

class VideosCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        factory(VideosCategory::class, 5)->create();
    }
}
