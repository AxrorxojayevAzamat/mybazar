<?php

namespace App\Services\Manage\Shop;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Shop\Characteristic;
use App\Entity\Shop\Modification;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductDiscount;
use App\Entity\Shop\Value;
use App\Entity\Store;
use App\Helpers\ColorHelper;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Shop\Products\CreateRequest;
use App\Http\Requests\Admin\Shop\Products\UpdateRequest;
use App\Http\Requests\Admin\Shop\Modifications\CreateRequest as ModificationCreateForm;
use App\Http\Requests\Admin\Shop\Modifications\UpdateRequest as ModificationUpdateForm;
use App\Http\Requests\Admin\Shop\Products\ValueRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\AssignOp\Mod;

class ProductService
{
    private $nextId;

    public function create(CreateRequest $request): Product
    {
        $mainCategory = Category::findOrFail($request->main_category_id);

        if ($mainCategory->children()->exists()) {
            throw new \Exception('Category ' . $mainCategory->name . ' has children, please choose category with no child category.');
        }

        $store = Store::findOrFail($request->store_id);
        $brand = Brand::findOrFail($request->brand_id);

        DB::beginTransaction();
        try {
            /* @var $product Product */
            $product = Product::make([
                'name_uz' => strip_tags(htmlspecialchars($request->name_uz)),
                'name_ru' => strip_tags(htmlspecialchars($request->name_ru)),
                'name_en' => strip_tags(htmlspecialchars($request->name_en)),
                'description_uz' => $request->description_uz ? htmlspecialchars($request->description_uz) : null,
                'description_ru' => $request->description_ru ? htmlspecialchars($request->description_ru) : null,
                'description_en' => $request->description_en ? htmlspecialchars($request->description_en) : null,
                'slug' => $request->slug,
                'price_uzs' => $request->price_uzs,
                'price_usd' => $request->price_usd ?? null,
                'discount' => $request->discount ?? 0,
                'discount_ends_at' => $request->discount ? $request->discount_ends_at_date . ' ' . $request->discount_ends_at_time . ':00' : null,
                'status' => Product::STATUS_DRAFT,
                'weight' => $request->weight ?? null,
                'quantity' => $request->quantity ?? null,
                'guarantee' => $request->guarantee ?? false,
                'bestseller' => $request->bestseller ?? false,
                'new' => $request->new ?? false,
            ]);

            $product->mainCategory()->associate($mainCategory);
            $product->store()->associate($store);
            $product->brand()->associate($brand);
            $product->saveOrFail();

            $this->addCategories($product, $request->categories);
            $this->addMarks($product, $request->marks);
            $this->addDiscounts($product, $request->discounts);

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
        $mainCategory = Category::findOrFail($request->main_category_id);

        if ($mainCategory->children()->exists()) {
            throw new \Exception('Category ' . $mainCategory->name . ' has children, please choose category with no child category.');
        }

        $store = Store::findOrFail($request->store_id);
        $brand = Brand::findOrFail($request->brand_id);

        DB::beginTransaction();
        try {
            $product->update([
                'name_uz' => strip_tags(htmlspecialchars($request->name_uz)),
                'name_ru' => strip_tags(htmlspecialchars($request->name_ru)),
                'name_en' => strip_tags(htmlspecialchars($request->name_en)),
                'description_uz' => $request->description_uz ? htmlspecialchars($request->description_uz) : null,
                'description_ru' => $request->description_ru ? htmlspecialchars($request->description_ru) : null,
                'description_en' => $request->description_en ? htmlspecialchars($request->description_en) : null,
                'slug' => $request->slug,
                'price_uzs' => $request->price_uzs,
                'price_usd' => $request->price_usd ?? null,
                'discount' => $request->discount ?? 0,
                'discount_ends_at' => $request->discount ? $request->discount_ends_at_date . ' ' . $request->discount_ends_at_time . ':00' : null,
                'main_category_id' => $mainCategory->id,
                'store_id' => $store->id,
                'brand_id' => $brand->id,
                'status' => $product->main_photo_id ? Product::STATUS_MODERATION : Product::STATUS_DRAFT,
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

            $product->productDiscounts()->delete();
            $this->addDiscounts($product, $request->discounts);


            DB::commit();

            return $product;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function sendToModeration(int $id): void
    {
        $product = Product::findOrFail($id);
        $product->sendToModeration();
    }

    public function moderate(int $id): void
    {
        $advert = Product::findOrFail($id);
        $advert->moderate();
    }

    public function activate(int $id): void
    {
        $advert = Product::findOrFail($id);
        $advert->activate();
    }

    public function draft(int $id): void
    {
        $advert = Product::findOrFail($id);
        $advert->draft();
    }

    public function close(int $id): void
    {
        $advert = Product::findOrFail($id);
        $advert->close();
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
                $product->update(['main_photo_id' => $photo->id, 'status' => Product::STATUS_MODERATION]);
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

            $product->update(['main_photo_id' => null, 'status' => Product::STATUS_DRAFT]);
            $product->mainPhoto()->delete();
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

    private function addCategories(Product $product, array $categories = null): void
    {
        if ($categories) {
            $categories = array_unique($categories);
            foreach ($categories as $i => $categoryId) {
                $product->productCategories()->create(['category_id' => $categoryId]);
            }
        }
    }

    private function addMarks(Product $product, array $marks): void
    {
        if ($marks) {
            $marks = array_unique($marks);
            foreach ($marks as $i => $markId) {
                $product->productMarks()->create(['mark_id' => $markId]);
            }
        }
    }

    private function addDiscounts(Product $product, array $discounts = null): void
    {
        if ($discounts) {
            $discounts = array_unique($discounts);
            foreach ($discounts as $i => $discount) {
                $product->productDiscounts()->create(['discount_id' => $discount]);
            }
        }
    }

    public function addModification(int $id, ModificationCreateForm $request): Modification
    {
        $product = Product::findOrFail($id);

        DB::beginTransaction();
        try {
            if (!$request->photo) {
                $modification = $product->modifications()->create([
                    'product_id' => $product->id,
                    'name_uz' => $request->name_uz,
                    'name_ru' => $request->name_ru,
                    'name_en' => $request->name_en,
                    'code' => $request->code,
                    'characteristic_id' => $request->characteristic_id,
                    'price_uzs' => $request->price_uzs,
                    'price_usd' => $request->price_usd,
                    'value' => $request->value ? $request->value : ($request->characteristic_value ?? null),
                    'sort' => 1000,
                    'photo' => '',
                ]);
                $this->sortModifications($product);

                return $modification;
            }

            $imageName = ImageHelper::getRandomName($request->photo);
            $modification = Modification::add($this->getNextModificationId(), $product->id, $request,  $imageName);

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
        $product = Product::findOrFail($id);
        $modification = $product->modifications()->where('id', $modificationId)->first();

        if ($request->color) {
            $modification->editColor($request);
        } else if ($request->value) {
            $modification->editValue($request);
        } else if ($request->characteristic_value) {
            $modification->editCharacteristicValue($request);
        } else if ($request->photo) {
            $this->deleteModificationPhoto($modification->id, $modification->photo);
            $imageName = ImageHelper::getRandomName($request->photo);

            $modification->editPhoto($request, $imageName);

            ImageHelper::saveThumbnail($modification->id, ImageHelper::FOLDER_MODIFICATIONS, $request->photo, $imageName);
            ImageHelper::saveOriginal($modification->id, ImageHelper::FOLDER_MODIFICATIONS, $request->photo, $imageName);
        } else {
            $modification->edit($request);
        }
    }

    public function removeModification(int $id, int $modificationId): void
    {
        $product = Product::findOrFail($id);
        $modification = $product->modifications()->where('id', $modificationId);

        DB::beginTransaction();
        try {
            $modification->delete();
            $this->sortModifications($product);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
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

    public function addValue(int $id, ValueRequest $request): Value
    {
        $product = Product::findOrFail($id);
        $characteristic = Characteristic::findOrFail($request->characteristic_id);

        /* @var $value Value */
        DB::beginTransaction();
        try {
            $value = $product->values()->create([
                'characteristic_id' => $characteristic->id,
                'value' => $request->value ?? $characteristic->default,
                'main' => (bool)$request->main,
                'sort' => 1000,
            ]);

            $this->sortValues($product);

            DB::commit();

            return $value;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateValue(int $id, int $characteristicId, ValueRequest $request): Value
    {
        $product = Product::findOrFail($id);
        $characteristic = Characteristic::findOrFail($request->characteristic_id);
        /* @var $value Value */
        $value = $product->values()->where('characteristic_id', $characteristicId)->firstOrFail();

        DB::beginTransaction();
        try {
            DB::table('shop_values')->where('product_id', $value->product_id)
                ->where('characteristic_id', $value->characteristic_id)->update([
                    'characteristic_id' => $characteristic->id,
                    'value' => $request->value ?? $characteristic->default,
                    'main' => $request->main,
            ]);

            $value = $product->values()->where('characteristic_id', $request->characteristic_id)->firstOrFail();

            DB::commit();

            return $value;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function removeValue(int $id, int $characteristicId): void
    {
        $product = Product::findOrFail($id);
        $value = $product->values()->where('characteristic_id', $characteristicId);

        DB::beginTransaction();
        try {
            $value->delete();
            $this->sortValues($product);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }


    }

    public function moveValueToFirst(int $id, int $characteristicId): void
    {
        $product = Product::findOrFail($id);
        $values = $product->values;

        foreach ($values as $i => $value) {
            if ($value->isCharacteristicIdEqualTo($characteristicId)) {
                for ($j = $i; $j >= 0; $j--) {
                    if (!isset($values[$j - 1])) {
                        break(1);
                    }

                    $prev = $values[$j - 1];
                    $values[$j - 1] = $values[$j];
                    $values[$j] = $prev;
                }
                $product->values = $values;

                DB::beginTransaction();
                try {
                    $this->sortValues($product);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveValueUp(int $id, int $characteristicId): void
    {
        $product = Product::findOrFail($id);
        $values = $product->values;

        foreach ($values as $i => $value) {
            if ($value->isCharacteristicIdEqualTo($characteristicId)) {
                if (!isset($values[$i - 1])) {
                    $count = count($values);

                    for ($j = 1; $j < $count; $j++) {
                        $next = $values[$j - 1];
                        $values[$j - 1] = $values[$j];
                        $values[$j] = $next;
                    }
                } else {
                    $previous = $values[$i - 1];
                    $values[$i - 1] = $value;
                    $values[$i] = $previous;
                }
                $product->values = $values;

                DB::beginTransaction();
                try {
                    $this->sortValues($product);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveValueDown(int $id, int $characteristicId): void
    {
        $product = Product::findOrFail($id);
        $values = $product->values;

        foreach ($values as $i => $value) {
            if ($value->isCharacteristicIdEqualTo($characteristicId)) {
                if (!isset($values[$i + 1])) {
                    $last = $values->last();
                    $count = count($values);

                    for ($j = $count - 1; $j > 0; $j--) {
                        $values[$j] = $values[$j - 1];
                    }

                    $values[$j] = $last;
                } else {
                    $next = $values[$i + 1];
                    $values[$i + 1] = $value;
                    $values[$i] = $next;
                }
                $product->modifications = $values;

                DB::beginTransaction();
                try {
                    $this->sortValues($product);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveValueToLast(int $id, int $characteristicId): void
    {
        $product = Product::findOrFail($id);
        $values = $product->values;

        foreach ($values as $i => $value) {
            if ($value->isCharacteristicIdEqualTo($characteristicId)) {
                $count = count($values);
                for ($j = $i; $j < $count; $j++) {
                    if (!isset($values[$j + 1])) {
                        break(1);
                    }

                    $next = $values[$j + 1];
                    $values[$j + 1] = $values[$j];
                    $values[$j] = $next;
                }
                $product->values = $values;

                DB::beginTransaction();
                try {
                    $this->sortValues($product);
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

    private function sortValues(Product $product): void
    {
        foreach ($product->values as $i => $value) {
            $value->setSort($i + 1);
            DB::table('shop_values')->where('product_id', $value->product_id)
                ->where('characteristic_id', $value->characteristic_id)->update(['sort' => ($i + 1)]);
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
        Storage::disk('public')->delete('/files/' . ImageHelper::FOLDER_PRODUCTS . '/' . $productId . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $filename);
        Storage::disk('public')->delete('/files/' . ImageHelper::FOLDER_PRODUCTS . '/' . $productId . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $filename);
    }

    private function deleteModificationPhoto(int $modificationId, string $filename)
    {
        Storage::disk('public')->delete('/files/' . ImageHelper::FOLDER_MODIFICATIONS . '/' . $modificationId . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $filename);
        Storage::disk('public')->delete('/files/' . ImageHelper::FOLDER_MODIFICATIONS . '/' . $modificationId . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $filename);
    }

    public function getNextModificationId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('shop_modifications_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public static function addProductToSession(int $id)
    {
        $sessionProduct = session()->get('product');
        if (!isset($sessionProduct[$id])) {
            if (empty($sessionProduct)){
                $sessionProduct = [
                    $id => [
                        "product_id" => $id,
                    ]
                ];
            }else{
                $sessionProduct += [
                    $id => [
                        "product_id" => $id,
                    ]
                ];
            }
            session()->put('product', $sessionProduct);
            return session()->get('product');
        } else {
            $sessionProduct = [];
            return  session()->get('product');
        }
    }
}
