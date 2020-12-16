<?php

use App\Entity\User\User;
use App\Entity\User\Profile;
use Illuminate\Database\Seeder;
use App\Helpers\ImageHelper;
use App\Helpers\SeederImageHelper;

class UsersTableSeeder extends Seeder
    {

    public function run(): void
    {
        SeederImageHelper::deleteFolder(ImageHelper::FOLDER_PROFILES);

        factory(User::class, 50)->create()->each(function (User $user) {
            $user->profile()->saveMany(factory(Profile::class, 1)->make());
        });

        $profiles = Profile::all();



        foreach ($profiles as $profile) {

            $randomFile = random_int(1, 5);
            $avatarF    = 'avatar' . $randomFile . '.png';
            $imagePath  = public_path('images/') . $avatarF;

            $imageName = SeederImageHelper::getRandomName($imagePath);
            $profile->update([
                'avatar' => $imageName ?: $imageName,
            ]);

            SeederImageHelper::uploadImage($profile->user_id, ImageHelper::FOLDER_PROFILES, $imagePath, $imageName);

//            SeederImageHelper::changeIdOwner($profile->user_id, ImageHelper::FOLDER_PROFILES);
        }
//        SeederImageHelper::changeOwner(storage_path('app/public/files/' . ImageHelper::FOLDER_PROFILES));
    }

    }
