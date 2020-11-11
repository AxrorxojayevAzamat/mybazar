<?php

use App\Entity\Shop\Product;
use App\Entity\User\User;
use Illuminate\Database\Seeder;

class UserFavoritesTableSeeder extends Seeder
{

    public function run() {
        $productIds = Product::where('status', Product::STATUS_ACTIVE)->pluck('id')->toArray();

        User::chunk(50, function ($users) use ($productIds) {
            $productCount = count($productIds);
            
            /* @var $user User */
            foreach ($users as $user) {
                $products = $productIds;
                $count    = random_int(0, $productCount);
                for ($i = 0; $i < $count; $i++) {
                    $key = array_rand($products);
                    $user->userFavorites()->create(['product_id' => $products[$key]]);
                    unset($products[$key]);
                }
            }
        });
    }

}
