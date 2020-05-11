<?php

use App\Entity\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Payment::class, 3)->create();
    }
}
