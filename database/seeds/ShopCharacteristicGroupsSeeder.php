<?php

use App\Entity\Shop\CharacteristicGroup;
use Illuminate\Database\Seeder;

class ShopCharacteristicGroupsSeeder extends Seeder
{
    public function run()
    {
        $order = 1;
        factory(CharacteristicGroup::class, 15)->make()->each(function (CharacteristicGroup $group) use (&$order) {
            $group->order = $order++;
            $group->save();
        });
    }
}
