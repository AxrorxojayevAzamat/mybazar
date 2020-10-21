<?php

use App\Entity\Blog\News;
use Illuminate\Database\Seeder;
use App\Helpers\ImageHelper;
use App\Helpers\SeederImageHelper;

class BlogNewsTableSeeder extends Seeder
{
    public function run()
    {
        SeederImageHelper::deleteFolder(ImageHelper::FOLDER_NEWS);

        factory(News::class, 15)->create();
        $posts = News::all();


        foreach ($posts as $post) {

            $file = 'news' . random_int(1, 5) . '.jpg';
            $imagePath = public_path('images/') . $file;

            $imageName = SeederImageHelper::getRandomName($imagePath);
            $post->update([
                'file' => $imageName ?: $imageName,
            ]);

            SeederImageHelper::uploadImage($post->id, ImageHelper::FOLDER_NEWS, $imagePath, $imageName);

//            SeederImageHelper::changeIdOwner($post->id, ImageHelper::FOLDER_NEWS);
        }
//        SeederImageHelper::changeOwner(storage_path('app/public/files/' . ImageHelper::FOLDER_NEWS));
    }
}
