<?php


namespace App\Services\Manage\Blog;


use App\Entity\Blog\Category;
use App\Entity\Blog\Video;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Blog\Videos\CreateRequest;
use App\Http\Requests\Admin\Blog\Videos\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VideoService
{
    private $nextId;

    public function create(CreateRequest $request): Video
    {
        $category = Category::findOrFail($request->category_id);

        if (!$request->poster) {
            return Video::create([
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

        $imageName = ImageHelper::getRandomName($request->poster);
        $videoName = ImageHelper::getRandomName($request->video);
        $post = Video::add($this->getNextId(), $request, $category->id, $imageName, $videoName);

        $this->uploadPoster($this->getNextId(), $request->poster, $imageName);
        $this->uploadVideo($this->getNextId(), $request->video, $videoName);

        return $post;
    }

    public function update(int $id, UpdateRequest $request): Video
    {
        $video = Video::findOrFail($id);
        $category = Category::findOrFail($request->category_id);

        if (!$request->poster) {
            $video->edit($request, $category->id);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_VIDEOS . '/' . $video->id);

            $imageName = ImageHelper::getRandomName($request->poster);
            $video->edit($request, $category->id, $imageName);

            $this->uploadPoster($video->id, $request->poster, $imageName);
        }

        return $video;
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('blog_videos_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removePoster(int $id): bool
    {
        $video = Video::findOrFail($id);
        return Storage::disk('public')->delete('/files/' . ImageHelper::FOLDER_VIDEOS . '/' . $video->id . '/' . $video->poster)
            && $video->update(['poster' => null]);
    }

    public function removeVideo(int $id): bool
    {
        $video = Video::findOrFail($id);
        $isDeleted = Storage::disk('public')->delete('/files/' . ImageHelper::FOLDER_VIDEOS . '/' . $video->id . '/' . $video->video);
        return $isDeleted && $video->update(['video' => null]);
    }

    private function uploadPoster(int $videoId, UploadedFile $file, string $posterName): void
    {
        ImageHelper::saveThumbnail($videoId, ImageHelper::FOLDER_VIDEOS, $file, $posterName);
        ImageHelper::saveOriginal($videoId, ImageHelper::FOLDER_VIDEOS, $file, $posterName);
    }

    private function uploadVideo(int $videoId, UploadedFile $file, string $videoName): void
    {
        ImageHelper::saveVideoFile($videoId, ImageHelper::FOLDER_VIDEOS, $file, $videoName);
    }
}
