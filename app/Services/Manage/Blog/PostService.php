<?php


namespace App\Services\Manage\Blog;


use App\Entity\Blog\Category;
use App\Entity\Blog\Post;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Blog\Posts\CreateRequest;
use App\Http\Requests\Admin\Blog\Posts\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    private $nextId;

    public function create(CreateRequest $request): Post
    {
        $category = Category::findOrFail($request->category_id);

        if (!$request->file) {
            return Post::create([
                'title_uz' => $request->title_uz,
                'title_ru' => $request->title_ru,
                'title_en' => $request->title_en,
                'description_uz' => $request->description_uz,
                'description_ru' => $request->description_ru,
                'description_en' => $request->description_en,
                'body_uz' => $request->body_uz,
                'body_ru' => $request->body_ru,
                'body_en' => $request->body_en,
                'category_id' => $category->id,
                'is_published' => $request->is_published,
            ]);
        }

        $imageName = ImageHelper::getRandomName($request->file);
        $post = Post::add($this->getNextId(), $request, $category->id, $imageName);

        $this->uploadFile($this->getNextId(), $request->file, $imageName);

        return $post;
    }

    public function update(int $id, UpdateRequest $request): Post
    {
        $post = Post::findOrFail($id);
        $category = Category::findOrFail($request->category_id);

        if (!$request->file) {
            $post->edit($request, $category->id);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_POSTS . '/' . $post->id);

            $imageName = ImageHelper::getRandomName($request->file);
            $post->edit($request, $category->id, $imageName);

            $this->uploadFile($post->id, $request->file, $imageName);
        }

        return $post;
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('blog_posts_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removeFile(int $id): bool
    {
        $post = Post::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_POSTS . '/' . $post->id)
            && $post->update(['file' => null]);
    }

    private function uploadFile(int $postId, UploadedFile $file, string $imageName): void
    {
        ImageHelper::saveThumbnail($postId, ImageHelper::FOLDER_POSTS, $file, $imageName);
        ImageHelper::saveOriginal($postId, ImageHelper::FOLDER_POSTS, $file, $imageName);
    }
}
