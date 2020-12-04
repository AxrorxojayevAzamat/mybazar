<?php

namespace App\Services\Manage\Shop;

use App\Entity\Category;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Shop\Categories\CreateRequest;
use App\Http\Requests\Admin\Shop\Categories\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    private $nextId;

    public function create(CreateRequest $request): Category
    {
        DB::beginTransaction();
        try {
            if ($request->parent) {
                $parent = Category::findOrFail($request->parent);
                $this->draftProducts($parent);
            }

            Category::flushQueryCache();

            if (!$request->photo) {
                $category = Category::create([
                    'name_uz' => $request->name_uz,
                    'name_ru' => $request->name_ru,
                    'name_en' => $request->name_en,
                    'description_uz' => $request->description_uz,
                    'description_ru' => $request->description_ru,
                    'description_en' => $request->description_en,
                    'slug' => $request->slug,
                    'parent_id' => $request->parent,
                ]);
            } else {
                $photoName = ImageHelper::getRandomName($request->photo);
                $iconName = ImageHelper::getRandomName($request->icon);
                $category = Category::add($this->getNextId(), $request, $photoName, $iconName);

                $this->uploadPhoto($this->getNextId(), $request->photo, $photoName);
                $this->uploadPhoto($this->getNextId(), $request->icon, $iconName);
            }

            !$request->brands ? : $this->addBrands($category, $request->brands);

            DB::commit();
            return $category;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(int $id, UpdateRequest $request): Category
    {
        $category = Category::findOrFail($id);

        DB::beginTransaction();
        try {
            if ($request->photo) {
                $this->deletePhoto($category->id, $category->photo);
                $photoName = ImageHelper::getRandomName($request->photo);
                $category->setPhoto($photoName);

                $this->uploadPhoto($category->id, $request->photo, $photoName);
            }

            if ($request->icon) {
                $this->deletePhoto($category->id, $category->icon);
                $iconName = ImageHelper::getRandomName($request->icon);
                $category->setIcon($iconName);

                $this->uploadPhoto($category->id, $request->icon, $iconName);
            }

            if ($request->parent) {
                $parent = Category::findOrFail($request->parent);
                $this->draftProducts($parent);
            }

            Category::flushQueryCache();

            $category->edit($request);

            $category->categoryBrands()->delete();
            !$request->brands ? : $this->addBrands($category, $request->brands);

            DB::commit();
            return $category;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('categories_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function remove(int $id): void
    {
        $category = Category::findOrFail($id);

        DB::beginTransaction();
        try {
            $category->categoryBrands()->delete();
            $category->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function removePhoto(int $id): bool
    {
        $category = Category::findOrFail($id);
        $this->deletePhoto($category->id, $category->photo);
        return $category->update(['photo' => null]);
    }

    public function removeIcon(int $id): bool
    {
        $category = Category::findOrFail($id);
        $this->deletePhoto($category->id, $category->icon);
        return $category->update(['icon' => null]);
    }

    private function addBrands(Category $category, array $brands): void
    {
        if (!empty($brands)) {
            $brands = array_unique($brands);
            foreach ($brands as $i => $brandId) {
                $category->categoryBrands()->create(['brand_id' => $brandId]);
            }
        }
    }

    private function draftProducts(Category $category): void
    {
        foreach ($category->products as $product) {
            if ($product->isActive()) {
                $product->setStatusCategorySplitted();
                $product->update();
            }
        }
    }

    private function deletePhoto(int $id, string $filename): void
    {
        Storage::disk('public')->delete('/files/' . ImageHelper::FOLDER_CATEGORIES . '/' . $id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $filename);
        Storage::disk('public')->delete('/files/' . ImageHelper::FOLDER_CATEGORIES . '/' . $id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $filename);
    }

    private function uploadPhoto(int $id, UploadedFile $photo, string $imageName): void
    {
        ImageHelper::saveThumbnail($id, ImageHelper::FOLDER_CATEGORIES, $photo, $imageName, 60, 60);
        ImageHelper::saveOriginal($id, ImageHelper::FOLDER_CATEGORIES, $photo, $imageName);
    }
}
