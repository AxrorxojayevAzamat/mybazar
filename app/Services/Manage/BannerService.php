<?php

namespace App\Services\Manage;

use App\Entity\Banner;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Banners\CreateRequest;
use App\Http\Requests\Admin\Banners\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerService {

    private $nextId;

    public function create(CreateRequest $request): Banner {
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
                        'is_published' => $request->is_published,
            ]);
        }

        $imageName = ImageHelper::getRandomName($request->file);
        $banner = Banner::add($this->getNextId(), $request, $imageName);

        $this->uploadFile($this->getNextId(), $request->file, $imageName);

        return $banner;
    }

    public function update(int $id, UpdateRequest $request): Banner {
        $banner = Banner::findOrFail($id);

        if (!$request->file) {
            $banner->edit($request);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_BANNERS . '/' . $banner->id);

            $imageName = ImageHelper::getRandomName($request->file);
            $banner->edit($request, $imageName);

            $this->uploadFile($banner->id, $request->file, $imageName);
        }

        return $banner;
    }

    public function getNextId(): int {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('banners_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removeFile(int $id): bool {
        $banner = Banner::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_BANNERS . '/' . $banner->id) && $banner->update(['file' => null]);
    }

    private function uploadFile(int $bannerId, UploadedFile $file, string $imageName): void {
        ImageHelper::saveThumbnail($bannerId, ImageHelper::FOLDER_BANNERS, $file, $imageName);
        ImageHelper::saveOriginal($bannerId, ImageHelper::FOLDER_BANNERS, $file, $imageName);
    }

}
