<?php

use App\Entity\Store;
use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    public function run()
    {
        factory(Store::class, 10)->create();
    }
}
