<?php


namespace App\Services\Manage\Blog;


use App\Entity\Blog\Category;
use App\Entity\Blog\News;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Blog\News\CreateRequest;
use App\Http\Requests\Admin\Blog\News\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsService
{
    private $nextId;

    public function create(CreateRequest $request): News
    {
        $category = Category::findOrFail($request->category_id);

        if (!$request->file) {
            return News::create([
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
        $post = News::add($this->getNextId(), $request, $category->id, $imageName);

        $this->uploadFile($this->getNextId(), $request->file, $imageName);

        return $post;
    }

    public function update(int $id, UpdateRequest $request): News
    {
        $post = News::findOrFail($id);
        $category = Category::findOrFail($request->category_id);

        if (!$request->file) {
            $post->edit($request, $category->id);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_NEWS . '/' . $post->id);

            $imageName = ImageHelper::getRandomName($request->file);
            $post->edit($request, $category->id, $imageName);

            $this->uploadFile($post->id, $request->file, $imageName);
        }

        return $post;
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('blog_news_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removeFile(int $id): bool
    {
        $post = News::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_NEWS . '/' . $post->id) && $post->update(['file' => null]);
    }

    private function uploadFile(int $postId, UploadedFile $file, string $imageName): void
    {
        ImageHelper::saveThumbnail($postId, ImageHelper::FOLDER_NEWS, $file, $imageName);
        ImageHelper::saveOriginal($postId, ImageHelper::FOLDER_NEWS, $file, $imageName);
    }
}
