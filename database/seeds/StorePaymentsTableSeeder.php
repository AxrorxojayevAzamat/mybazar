<?php

use App\Entity\Payment;
use App\Entity\Store;
use Illuminate\Database\Seeder;

class StorePaymentsTableSeeder extends Seeder
{
    public function run()
    {
        $paymentIds = Payment::pluck('id')->toArray();

        Store::chunk(100, function ($stores) use ($paymentIds) {
            $paymentCount = count($paymentIds);

            /* @var $store Store */
            foreach ($stores as $store) {
                $payments = $paymentIds;
                $count = random_int(0, $paymentCount);
                for ($i = 0; $i < $count; $i++) {
                    $key = array_rand($payments);
                    $store->storePayments()->create(['payment_id' => $payments[$key]]);
                    unset($payments[$key]);
                }
            }
        });
    }
}
