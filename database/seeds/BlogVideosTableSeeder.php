<?php

use App\Entity\Blog\Video;
use Illuminate\Database\Seeder;

class BlogVideosTableSeeder extends Seeder
{
    public function run()
    {
        factory(Video::class, 15)->create();
    }
}
