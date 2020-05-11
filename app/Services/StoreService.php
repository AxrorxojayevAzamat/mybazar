<?php


namespace App\Services;


use App\Entity\Store;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\stores\CreateRequest;
use App\Http\Requests\Admin\stores\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreService
{
    private $nextId;

    public function create(CreateRequest $request): Store
    {
        if (!$request->logo) {
            return Store::create([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'slug' => $request->slug,
            ]);
        }

        $imageName = ImageHelper::getRandomName($request->logo);
        $store = Store::add($this->getNextId(), $request->name_uz, $request->name_ru, $request->name_en, $request->slug, $imageName);

        $this->uploadLogo($this->getNextId(), $request->logo, $imageName);

        return $store;
    }

    public function update(int $id, UpdateRequest $request): Store
    {
        $store = Store::findOrFail($id);

        if (!$request->logo) {
            $store->edit($request->name_uz, $request->name_ru, $request->name_en, $request->slug);
        } else {
            Storage::disk('public')->deleteDirectory('/images/' . ImageHelper::FOLDER_STORES . '/' . $store->id);

            $imageName = ImageHelper::getRandomName($request->logo);
            $store->edit($request->name_uz, $request->name_ru, $request->name_en, $request->slug, $imageName);

            $this->uploadLogo($store->id, $request->logo, $imageName);
        }

        return $store;
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('stores_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removeLogo(int $id): bool
    {
        $store = Store::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/images/' . ImageHelper::FOLDER_STORES . '/' . $store->id) && $store->update(['logo' => null]);
    }

    private function uploadLogo(int $storeId, UploadedFile $logo, string $imageName)
    {
        ImageHelper::saveThumbnail($storeId, ImageHelper::FOLDER_STORES, $logo, $imageName);
        ImageHelper::saveOriginal($storeId, ImageHelper::FOLDER_STORES, $logo, $imageName);
    }
}
