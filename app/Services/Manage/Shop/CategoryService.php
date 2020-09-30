<?php

namespace App\Services\Manage\Shop;

use App\Entity\Shop\Category;
use App\Http\Requests\Admin\Shop\Categories\CreateRequest;
use App\Http\Requests\Admin\Shop\Categories\UpdateRequest;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function create(CreateRequest $request): Category
    {
        DB::beginTransaction();
        try {
            $category = Category::create([
                'name_uz' => $request['name_uz'],
                'name_ru' => $request['name_ru'],
                'name_en' => $request['name_en'],
                'description_uz' => $request['description_uz'],
                'description_ru' => $request['description_ru'],
                'description_en' => $request['description_en'],
                'slug' => $request['slug'],
                'parent_id' => $request['parent'],
            ]);

            $this->addBrands($category, $request->brands);

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
            $category->update([
                'name_uz' => $request['name_uz'],
                'name_ru' => $request['name_ru'],
                'name_en' => $request['name_en'],
                'description_uz' => $request['description_uz'],
                'description_ru' => $request['description_ru'],
                'description_en' => $request['description_en'],
                'slug' => $request['slug'],
                'parent_id' => $request['parent'],
            ]);

            $category->categoryBrands()->delete();
            $this->addBrands($category, $request->brands);

            DB::commit();
            return $category;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
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

    private function addBrands(Category $category, array $brands): void
    {
        $brands = array_unique($brands);
        foreach ($brands as $i => $brandId) {
            $category->categoryBrands()->create(['brand_id' => $brandId]);
        }
    }
}
