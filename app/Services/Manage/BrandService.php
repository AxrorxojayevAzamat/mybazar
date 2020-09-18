<?php


namespace App\Services\Manage;


use App\Entity\Brand;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Brands\CreateRequest;
use App\Http\Requests\Admin\Brands\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BrandService
{
    private $nextId;

    public function create(CreateRequest $request): Brand
    {
        if (!$request->logo) {
            return Brand::create([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'slug' => $request->slug,
            ]);
        }

        $imageName = ImageHelper::getRandomName($request->logo);
        $brand = Brand::add($this->getNextId(), $request->name_uz, $request->name_ru, $request->name_en, $request->slug, $imageName);

        $this->uploadLogo($this->getNextId(), $request->logo, $imageName);

        return $brand;
    }

    public function update(int $id, UpdateRequest $request): Brand
    {
        $brand = Brand::findOrFail($id);

        if (!$request->logo) {
            $brand->edit($request->name_uz, $request->name_ru, $request->name_en, $request->slug);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_BRANDS . '/' . $brand->id);

            $imageName = ImageHelper::getRandomName($request->logo);
            $brand->edit($request->name_uz, $request->name_ru, $request->name_en, $request->slug, $imageName);

            $this->uploadLogo($brand->id, $request->logo, $imageName);
        }

        return $brand;
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('brands_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removeLogo(int $id): bool
    {
        $brand = Brand::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_BRANDS . '/' . $brand->id) && $brand->update(['logo' => null]);
    }

    private function uploadLogo(int $brandId, UploadedFile $logo, string $imageName)
    {
        ImageHelper::saveThumbnail($brandId, ImageHelper::FOLDER_BRANDS, $logo, $imageName);
        ImageHelper::saveOriginal($brandId, ImageHelper::FOLDER_BRANDS, $logo, $imageName);
    }
}
