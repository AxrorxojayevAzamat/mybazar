<?php

use App\Entity\Discount;
use Illuminate\Database\Seeder;
use App\Helpers\ImageHelper;
use App\Helpers\SeederImageHelper;

class DiscountsTableSeeder extends Seeder {

    public function run() {

        SeederImageHelper::deleteFolder(ImageHelper::FOLDER_DISCOUNTS);

        factory(Discount::class, 15)->create();
        $discounts = Discount::all();


        foreach ($discounts as $discount) {

            $randomFile = random_int(1, 17);
            $posterF = 'sales' . $randomFile . '.png';
            $imagePath = public_path('images/') . $posterF;

            $imageName = SeederImageHelper::getRandomName($imagePath);
            $discount->update([
                'photo' => $imageName ?: $imageName,
            ]);

            SeederImageHelper::uploadImage($discount->id, ImageHelper::FOLDER_DISCOUNTS, $imagePath, $imageName);

            SeederImageHelper::changeIdOwner($discount->id, ImageHelper::FOLDER_DISCOUNTS);
        }
        SeederImageHelper::changeOwner(storage_path('app/public/files/' . ImageHelper::FOLDER_DISCOUNTS));
    }

}
