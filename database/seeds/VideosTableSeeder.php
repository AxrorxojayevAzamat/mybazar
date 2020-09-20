<?php

use App\Models\Videos;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    public function run()
    {
        factory(Videos::class, 15)->create();
    }
}
