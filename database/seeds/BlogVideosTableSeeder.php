<?php

use App\Entity\Blog\Video;
use Illuminate\Database\Seeder;
use App\Helpers\ImageHelper;
use App\Helpers\SeederImageHelper;

class BlogVideosTableSeeder extends Seeder {

    public function run() {

        SeederImageHelper::deleteFolder(ImageHelper::FOLDER_VIDEOS);

        factory(Video::class, 15)->create();
        $videos = Video::all();


        foreach ($videos as $video) {

            $randomFile = random_int(1, 4);
            $posterF = 'poster' . $randomFile . '.jpg';
            $videoF = 'poster-video' . $randomFile . '.mp4';
            $imagePath = public_path('images/') . $posterF;
            $videoPath = public_path('images/') . $videoF;

            $imageName = SeederImageHelper::getRandomName($imagePath);
            $videoName = SeederImageHelper::getRandomName($videoPath);
            $video->update([
                'poster' => $imageName ?: $imageName,
                'video' => $videoName ?: $videoName,
            ]);

            SeederImageHelper::uploadImage($video->id, ImageHelper::FOLDER_VIDEOS, $imagePath, $imageName);
            SeederImageHelper::uploadVideo($video->id, ImageHelper::FOLDER_VIDEOS, $videoPath, $videoName);

            SeederImageHelper::changeIdOwner($video->id, ImageHelper::FOLDER_VIDEOS);
        }
        SeederImageHelper::changeOwner(storage_path('app/public/files/' . ImageHelper::FOLDER_VIDEOS));
    }

}
