<?php

use App\Entity\DeliveryMethod;
use App\Entity\Store;
use Illuminate\Database\Seeder;

class StoreDeliveryMethodsTableSeeder extends Seeder
{
    public function run()
    {
        $deliveryMethodIds = DeliveryMethod::pluck('id')->toArray();

        Store::chunk(100, function ($stores) use ($deliveryMethodIds) {
            $deliveryMethodCount = count($deliveryMethodIds);

            /* @var $store Store */
            foreach ($stores as $store) {
                $deliveryMethods = $deliveryMethodIds;
                $count = random_int(0, $deliveryMethodCount);
                $sort = 1;
                for ($i = 0; $i < $count; $i++) {
                    $key = array_rand($deliveryMethods);
                    $store->storeDeliveryMethods()->create(['delivery_method_id' => $deliveryMethods[$key], 'sort' => $sort++]);
                    unset($deliveryMethods[$key]);
                }
            }
        });
    }
}
