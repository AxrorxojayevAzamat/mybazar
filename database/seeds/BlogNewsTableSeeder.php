<?php

use App\Entity\Blog\News;
use Illuminate\Database\Seeder;

class BlogNewsTableSeeder extends Seeder
{
    public function run()
    {
        factory(News::class, 15)->create();
    }
}
