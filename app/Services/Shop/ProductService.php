<?php

namespace App\Services\Shop;

use App\Entity\Brand;
use App\Entity\Shop\Modification;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Shop\Products\CreateRequest;
use App\Http\Requests\Admin\Shop\Products\UpdateRequest;
use App\Http\Requests\Admin\Shop\Modifications\CreateRequest as ModificationCreateForm;
use App\Http\Requests\Admin\Shop\Modifications\UpdateRequest as ModificationUpdateForm;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\VarDumper;

class ProductService
{
    private $nextId;

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

            $this->addCategories($product, $request->categories);
            $this->addMarks($product, $request->marks);

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
            $this->addCategories($product, $request->categories);

            $product->productMarks()->delete();
            $this->addMarks($product, $request->marks);


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

    private function addCategories(Product $product, array $categories)
    {
        $categories = array_unique($categories);
        foreach ($categories as $i => $categoryId) {
            $product->productCategories()->create(['category_id' => $categoryId]);
        }
    }

    private function addMarks(Product $product, array $marks)
    {
        $marks = array_unique($marks);
        foreach ($marks as $i => $markId) {
            $product->productMarks()->create(['mark_id' => $markId]);
        }
    }

    public function addModification(int $id, ModificationCreateForm $request): Modification
    {
        $product = Product::findOrFail($id);

        DB::beginTransaction();
        try {
            if (!$request->photo) {
                $modification = Modification::create([
                    'product_id' => $product->id,
                    'name_uz' => $request->name_uz,
                    'name_ru' => $request->name_ru,
                    'name_en' => $request->name_en,
                    'code' => $request->code,
                    'price_uzs' => $request->price_uzs,
                    'price_usd' => $request->price_usd,
                    'color' => $request->color,
                    'sort' => 1000,
                ]);

                $this->sortModifications($product);
            }

            $imageName = ImageHelper::getRandomName($request->photo);
            $modification = Modification::add($this->getNextModificationId(), $product->id, $request, $imageName);
            $modification->saveOrFail();

            $this->sortModifications($product);

            DB::commit();

            ImageHelper::saveThumbnail($this->getNextModificationId(), ImageHelper::FOLDER_MODIFICATIONS, $request->photo, $imageName);
            ImageHelper::saveOriginal($this->getNextModificationId(), ImageHelper::FOLDER_MODIFICATIONS, $request->photo, $imageName);

            return $modification;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateModification(int $id, int $modificationId, ModificationUpdateForm $request): void
    {
        $modification = Modification::findOrFail($modificationId)->where('product_id', $id);

        if ($request->color) {
            $modification->edit($request, $request->color);
        } else if ($request->photo) {
            $this->deleteModificationPhoto($modification->id, $modification->photo);
            $imageName = ImageHelper::getRandomName($request->photo);

            $modification->edit($request, null, $imageName);

            ImageHelper::saveThumbnail($this->getNextModificationId(), ImageHelper::FOLDER_MODIFICATIONS, $request->photo, $imageName);
            ImageHelper::saveOriginal($this->getNextModificationId(), ImageHelper::FOLDER_MODIFICATIONS, $request->photo, $imageName);
        } else {
            $modification->edit($request);
        }
    }

    public function moveModificationToFirst(int $id, int $modificationId): void
    {
        $product = Product::findOrFail($id);
        $modifications = $product->modifications;

        foreach ($modifications as $i => $modification) {
            if ($modification->isIdEqualTo($modificationId)) {
                for ($j = $i; $j >= 0; $j--) {
                    if (!isset($modifications[$j - 1])) {
                        break(1);
                    }

                    $prev = $modifications[$j - 1];
                    $modifications[$j - 1] = $modifications[$j];
                    $modifications[$j] = $prev;
                }
                $product->modifications = $modifications;

                DB::beginTransaction();
                try {
                    $this->sortModifications($product);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveModificationUp(int $id, int $modificationId): void
    {
        $product = Product::findOrFail($id);
        $modifications = $product->modifications;

        /* @var $modification Modification */
        foreach ($modifications as $i => $modification) {
            if ($modification->isIdEqualTo($modificationId)) {
                if (!isset($modifications[$i - 1])) {
                    $count = count($modifications);

                    for ($j = 1; $j < $count; $j++) {
                        $next = $modifications[$j - 1];
                        $modifications[$j - 1] = $modifications[$j];
                        $modifications[$j] = $next;
                    }
                } else {
                    $previous = $modifications[$i - 1];
                    $modifications[$i - 1] = $modification;
                    $modifications[$i] = $previous;
                }
                $product->modifications = $modifications;

                DB::beginTransaction();
                try {
                    $this->sortModifications($product);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveModificationDown(int $id, int $modificationId): void
    {
        $product = Product::findOrFail($id);
        $modifications = $product->modifications;

        /* @var $modification Modification */
        foreach ($modifications as $i => $modification) {
            if ($modification->isIdEqualTo($modificationId)) {
                if (!isset($modifications[$i + 1])) {
                    $last = $modifications->last();
                    $count = count($modifications);

                    for ($j = $count - 1; $j > 0; $j--) {
                        $modifications[$j] = $modifications[$j - 1];
                    }

                    $modifications[$j] = $last;
                } else {
                    $next = $modifications[$i + 1];
                    $modifications[$i + 1] = $modification;
                    $modifications[$i] = $next;
                }
                $product->modifications = $modifications;

                DB::beginTransaction();
                try {
                    $this->sortModifications($product);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveModificationToLast(int $id, int $modificationId): void
    {
        $product = Product::findOrFail($id);
        $modifications = $product->modifications;

        foreach ($modifications as $i => $modification) {
            if ($modification->isIdEqualTo($modificationId)) {
                $count = count($modifications);
                for ($j = $i; $j < $count; $j++) {
                    if (!isset($modifications[$j + 1])) {
                        break(1);
                    }

                    $next = $modifications[$j + 1];
                    $modifications[$j + 1] = $modifications[$j];
                    $modifications[$j] = $next;
                }
                $product->modifications = $modifications;

                DB::beginTransaction();
                try {
                    $this->sortModifications($product);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    private function sortModifications(Product $product): void
    {
        foreach ($product->modifications as $i => $modification) {
            $modification->setSort($i + 1);
            $modification->saveOrFail();
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

    private function deleteModificationPhoto(int $modificationId, string $filename)
    {
        Storage::disk('public')->delete('/images/' . ImageHelper::FOLDER_MODIFICATIONS . '/' . $modificationId . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $filename);
        Storage::disk('public')->delete('/images/' . ImageHelper::FOLDER_MODIFICATIONS . '/' . $modificationId . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $filename);
    }

    public function getNextModificationId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('shop_modifications_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }
}
