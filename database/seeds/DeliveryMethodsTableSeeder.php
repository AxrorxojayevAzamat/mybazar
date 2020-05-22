<?php

use App\Entity\DeliveryMethod;
use Illuminate\Database\Seeder;

class DeliveryMethodsTableSeeder extends Seeder
{
    public function run()
    {
        factory(DeliveryMethod::class, 5)->create();
    }
}
