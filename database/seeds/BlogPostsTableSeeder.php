<?php

use App\Entity\Blog\Post;
use Illuminate\Database\Seeder;
use App\Helpers\ImageHelper;
use App\Helpers\SeederImageHelper;

class BlogPostsTableSeeder extends Seeder {

    public function run() {
        SeederImageHelper::deleteFolder(ImageHelper::FOLDER_POSTS);

        factory(Post::class, 15)->create();
        $posts = Post::all();


        foreach ($posts as $post) {

            $file = 'post' . random_int(1, 5) . '.jpg';
            $imagePath = public_path('images/') . $file;

            $imageName = SeederImageHelper::getRandomName($imagePath);
            $post->update([
                'file' => $imageName ?: $imageName,
            ]);

            SeederImageHelper::uploadImage($post->id, ImageHelper::FOLDER_POSTS, $imagePath, $imageName);

            SeederImageHelper::changeIdOwner($post->id, ImageHelper::FOLDER_POSTS);
        }
        SeederImageHelper::changeOwner(storage_path('app/public/files/' . ImageHelper::FOLDER_POSTS));
    }

}
