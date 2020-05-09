<?php


namespace App\Services;


use App\Entity\Brand;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Brands\CreateRequest;
use App\Http\Requests\Admin\Brands\UpdateRequest;
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

        ImageHelper::uploadResizedImage($this->getNextId(), ImageHelper::FOLDER_BRANDS, $request->logo, $imageName);

        return $brand;
    }

    public function update(int $id, UpdateRequest $request): Brand
    {
        $brand = Brand::findOrFail($id);

        if (!$request->logo) {
            $brand->edit($request->name_uz, $request->name_ru, $request->name_en, $request->slug);
        } else {
            Storage::disk('public')->deleteDirectory('/images/' . ImageHelper::FOLDER_BRANDS . '/' . $brand->id);

            $imageName = ImageHelper::getRandomName($request->logo);
            $brand->edit($request->name_uz, $request->name_ru, $request->name_en, $request->slug, $imageName);

            ImageHelper::uploadResizedImage($brand->id, ImageHelper::FOLDER_BRANDS, $request->logo, $imageName);
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
        return Storage::disk('public')->deleteDirectory('/images/' . ImageHelper::FOLDER_BRANDS . '/' . $brand->id) && $brand->update(['logo' => null]);
    }
}
