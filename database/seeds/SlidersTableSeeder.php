<?php

use App\Entity\Slider;
use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    public function run()
    {
        factory(Slider::class, 15)->create();
    }
}
