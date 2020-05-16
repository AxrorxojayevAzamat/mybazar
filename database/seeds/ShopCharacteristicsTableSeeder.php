<?php

use App\Entity\Shop\Characteristic;
use Illuminate\Database\Seeder;

class ShopCharacteristicsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Characteristic::class, 50)->create();
    }
}
