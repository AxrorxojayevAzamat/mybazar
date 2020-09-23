<?php

use App\Entity\Banner;
use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    public function run()
    {
        factory(Banner::class, 15)->create();
    }
}
