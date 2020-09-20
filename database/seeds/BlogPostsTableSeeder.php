<?php

use App\Entity\Blog\Post;
use Illuminate\Database\Seeder;

class BlogPostsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Post::class, 15)->create();
    }
}
