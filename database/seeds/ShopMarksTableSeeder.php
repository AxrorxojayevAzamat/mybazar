<?php

use App\Entity\Shop\Mark;
use Illuminate\Database\Seeder;

class ShopMarksTableSeeder extends Seeder
{
    public function run()
    {
        factory(Mark::class, 10)->create();
    }
}
