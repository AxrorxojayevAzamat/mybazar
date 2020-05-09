<?php

namespace App\Services\Shop;

use App\Entity\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Shop\Products\CreateRequest;
use App\Http\Requests\Admin\Shop\Products\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function addMainPhoto(int $id, UploadedFile $image)
    {
        $this->addPhoto($id, $image, true);
    }

    public function addPhoto(int $id, UploadedFile $image, bool $main = false): void
    {
        $product = Product::findOrFail($id);

        $imageName = ImageHelper::getRandomName($image);

        DB::beginTransaction();
        try {
            if (!$main) {
                $photo = $product->photos()->create([
                    'product_id' => $product->id,
                    'file' => $imageName,
                    'sort' => 100,
                ]);

                $this->sortPhotos($product);
            } else {
                $photo = $product->mainPhoto()->create([
                    'product_id' => $product->id,
                    'file' => $imageName,
                    'sort' => 1,
                ]);
                $product->update(['main_photo_id' => $photo->id]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        ImageHelper::uploadResizedImage($product->id, ImageHelper::FOLDER_PRODUCTS, $image, $imageName);
    }

    public function removeMainPhoto(int $id): bool
    {
        $product = Product::findOrFail($id);

        $this->deletePhotos($product->id, $product->mainPhoto->file);

        DB::beginTransaction();
        try {

            $product->mainPhoto()->delete();
            $product->update(['main_photo_id' => null]);
            $this->sortPhotos($product);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function removePhoto(int $id, int $photoId): bool
    {
        $product = Product::findOrFail($id);

        if ($product->main_photo_id === $photoId) {
            throw new \Exception('Cannot delete main photo.');
        }

        $photo = $product->photos()->findOrFail($photoId);

        $this->deletePhotos($product->id, $photo->file);

        DB::beginTransaction();
        try {
            $photo->delete();
            $this->sortPhotos($product);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function movePhotoUp(int $id, int $photoId): void
    {
        $product = Product::findOrFail($id);
        $photos = $product->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($photoId)) {
                if (!isset($photos[$i - 1])) {
                    $previous = $photos->last();
                    $photos[count($photos) - 1] = $photo;
                    $photos[$i] = $previous;
                } else {
                    $previous = $photos[$i - 1];
                    $photos[$i - 1] = $photo;
                    $photos[$i] = $previous;
                }
                $product->photos = $photos;
                DB::beginTransaction();
                try {
                    $this->sortPhotos($product);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function movePhotoDown(int $id, int $photoId): void
    {
        $product = Product::findOrFail($id);
        $photos = $product->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($photoId)) {
                if (!isset($photos[$i + 1])) {
                    $next = $photos->first();
                    $photos[0] = $photo;
                    $photos[$i] = $next;
                } else {
                    $next = $photos[$i + 1];
                    $photos[$i + 1] = $photo;
                    $photos[$i] = $next;
                }
                $product->photos = $photos;
                DB::beginTransaction();
                try {
                    $this->sortPhotos($product);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    private function sortPhotos(Product $product): void
    {
        foreach ($product->photos as $i => $photo) {
            $photo->setSort($i + 2);
            $photo->saveOrFail();
        }
    }

    private function deletePhotos(int $productId, string $filename)
    {
        Storage::disk('public')->delete('/images/' . ImageHelper::FOLDER_PRODUCTS . '/' . $productId . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $filename);
        Storage::disk('public')->delete('/images/' . ImageHelper::FOLDER_PRODUCTS . '/' . $productId . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $filename);
    }
}
