<?php

namespace App\Services\Manage;

use App\Entity\Banner;
use App\Entity\Category;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Banners\CreateRequest;
use App\Http\Requests\Admin\Banners\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerService
{

    private $nextId;

    public function create(CreateRequest $request): Banner
    {
        $category = Category::findOrFail($request->category_id);
        if (!$request->file) {
            return Banner::create([
                'title_uz' => $request->title_uz,
                'title_ru' => $request->title_ru,
                'title_en' => $request->title_en,
                'description_uz' => $request->description_uz,
                'description_ru' => $request->description_ru,
                'description_en' => $request->description_en,
                'url' => $request->url,
                'slug' => $request->slug,
                'category_id' => $category->id,
                'status' => $request->status,
                'type' => $request->type,
            ]);
        }

        $imageName = ImageHelper::getRandomName($request->file);
        $banner = Banner::add($this->getNextId(), $request, $category->id, $imageName);

        $this->uploadFile($this->getNextId(), $request->file, $imageName, $request->type);

        return $banner;
    }

    public function update(int $id, UpdateRequest $request): Banner
    {
        $banner = Banner::findOrFail($id);
        $category = Category::findOrFail($request->category_id);

        if (!$request->file) {
            $banner->edit($request, $category->id);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_BANNERS . '/' . $banner->id);

            $imageName = ImageHelper::getRandomName($request->file);
            $banner->edit($request, $category->id, $imageName);

            $this->uploadFile($banner->id, $request->file, $imageName, $request->type);
        }

        return $banner;
    }

    public function publish(int $id): void
    {
        $advert = Banner::findOrFail($id);
        $advert->publish();
    }

    public function discard(int $id): void
    {
        $advert = Banner::findOrFail($id);
        $advert->discard();
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('banners_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removeFile(int $id): bool
    {
        $banner = Banner::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_BANNERS . '/' . $banner->id) && $banner->update(['file' => null]);
    }

    private function uploadFile(int $bannerId, UploadedFile $file, string $imageName, int $type): void
    {
        ImageHelper::saveThumbnail($bannerId, ImageHelper::FOLDER_BANNERS, $file, $imageName);
        if ($type === Banner::TYPE_SHORT) {
            ImageHelper::saveCustom($bannerId, ImageHelper::FOLDER_BANNERS, $file, $imageName, 487, 300);
        } else {
            ImageHelper::saveCustom($bannerId, ImageHelper::FOLDER_BANNERS, $file, $imageName, 1530, 200);
        }
        ImageHelper::saveOriginal($bannerId, ImageHelper::FOLDER_BANNERS, $file, $imageName);
    }

}
