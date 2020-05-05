<?php

namespace App\Services\Shop;

use App\Entity\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Http\Requests\Admin\Shop\Products\CreateRequest;
use App\Http\Requests\Admin\Shop\Products\UpdateRequest;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function getCategoryList(): array
    {
        /* @var $category Category */
        $categories = Category::defaultOrder()->withDepth()->get();
        $categoryIds = [];
        foreach ($categories as $category) {
            $name = '';
            for ($i = 0; $i < $category->depth; $i++) {
                $name .= '— ';
            }
            $categoryIds[$category->id] = $name . $category->name;
        }
        return $categoryIds;
    }

    public function create(CreateRequest $request): Product
    {
        $store = Store::findOrFail($request->store_id);
        $brand = Brand::findOrFail($request->brand_id);

        DB::beginTransaction();
        try {
            /* @var $product Product */
            $product = Product::make([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'description_uz' => $request->description_uz ?? null,
                'description_ru' => $request->description_ru ?? null,
                'description_en' => $request->description_en ?? null,
                'slug' => $request->slug,
                'price_uzs' => $request->price_uzs,
                'price_usd' => $request->price_usd ?? null,
                'discount' => $request->discount ?? 0,
                'status' => $request->status,
                'weight' => $request->weight ?? null,
                'quantity' => $request->quantity ?? null,
                'guarantee' => $request->guarantee ?? false,
                'bestseller' => $request->bestseller ?? false,
                'new' => $request->new ?? false,
            ]);

            $product->store()->associate($store);
            $product->brand()->associate($brand);
            $product->saveOrFail();

            $categories = array_unique($request->categories);
            foreach ($categories as $i => $categoryId) {
                $product->productCategories()->create(['category_id' => $categoryId]);
            }

            DB::commit();

            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update($id, UpdateRequest $request): Product
    {
        $product = Product::findOrFail($id);
        $store = Store::findOrFail($request->store_id);
        $brand = Brand::findOrFail($request->brand_id);

        DB::beginTransaction();
        try {
            $product->update([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'description_uz' => $request->description_uz ?? null,
                'description_ru' => $request->description_ru ?? null,
                'description_en' => $request->description_en ?? null,
                'slug' => $request->slug,
                'price_uzs' => $request->price_uzs,
                'price_usd' => $request->price_usd ?? null,
                'discount' => $request->discount ?? null,
                'store_id' => $store->id,
                'brand_id' => $brand->id,
                'status' => $request->status,
                'weight' => $request->weight ?? null,
                'quantity' => $request->quantity ?? null,
                'guarantee' => $request->guarantee ?? false,
                'bestseller' => $request->bestseller ?? false,
                'new' => $request->new ?? false,
            ]);

            $product->productCategories()->delete();
            $categories = array_unique($request->categories);
            foreach ($categories as $i => $categoryId) {
                $product->productCategories()->create(['category_id' => $categoryId]);
            }

            DB::commit();

            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
