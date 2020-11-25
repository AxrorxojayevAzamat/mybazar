<?php

namespace App\Services\Manage;

use App\Entity\Discount;
use App\Entity\Shop\Product;
use App\Entity\Shop\ShopDiscounts;
use App\Entity\Store;
use App\Entity\StoreDeliveryMethod;
use App\Entity\StoreUser;
use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\stores\CreateRequest;
use App\Http\Requests\Admin\stores\UpdateRequest;
use App\Http\Requests\Admin\Stores\Users\CreateRequest as UserCreateRequest;
use App\Http\Requests\Admin\Stores\Users\UpdateRequest as UserUpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreService
{
    private $nextId;

    public function create(CreateRequest $request): Store
    {
        DB::beginTransaction();
        try {
            if (!$request->logo) {
                return Store::create([
                    'name_uz' => $request->name_uz,
                    'name_ru' => $request->name_ru,
                    'name_en' => $request->name_en,
                    'slug' => $request->slug,
                    'status' => Store::STATUS_MODERATION,
                ]);
            }

            $imageName = ImageHelper::getRandomName($request->logo);
            $store = Store::add($this->getNextId(), $request->name_uz, $request->name_ru, $request->name_en, $request->slug, $imageName);
            $this->addCategories($store, $request->categories);
            $this->addMarks($store, $request->marks);
            $this->addPayments($store, $request->payments);
            $this->addDeliveryMethods($store, $request->delivery_methods, $request->cost, $request->sort);
            $this->addDiscounts($store, $request->discounts);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        $this->uploadLogo($this->getNextId(), $request->logo, $imageName);

        return $store;
    }

    public function update(int $id, UpdateRequest $request): Store
    {
        $store = Store::findOrFail($id);

        if (!$request->logo) {
            DB::beginTransaction();
            try {
                $store->edit($request->name_uz, $request->name_ru, $request->name_en, $request->slug);

                $this->updateRelations($store, $request);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } else {
            $imageName = ImageHelper::getRandomName($request->logo);

            DB::beginTransaction();
            try {
                $store->edit($request->name_uz, $request->name_ru, $request->name_en, $request->slug, $imageName);
                $this->updateRelations($store, $request);

                Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_STORES . '/' . $store->id);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            $this->uploadLogo($store->id, $request->logo, $imageName);
        }

        return $store;
    }

    public function moderate(int $id): void
    {
        $advert = Store::findOrFail($id);
        $advert->moderate();
    }

    public function draft(int $id): void
    {
        $advert = Store::findOrFail($id);
        $advert->draft();
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
        return Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_STORES . '/' . $store->id) && $store->update(['logo' => null]);
    }

    private function updateRelations(Store $store, UpdateRequest $request): void
    {
        $store->storeCategories()->delete();
        $this->addCategories($store, $request->categories);

        $store->storeMarks()->delete();
        $this->addMarks($store, $request->marks);

        $store->storePayments()->delete();
        $this->addPayments($store, $request->payments);

        $store->storeDeliveryMethods()->delete();
        $this->addDeliveryMethods($store, $request->delivery_methods);
    }

    private function addCategories(Store $store, array $categories)
    {
        $categories = array_unique($categories);
        foreach ($categories as $categoryId) {
            $store->storeCategories()->create(['category_id' => $categoryId]);
        }
    }

    private function addMarks(Store $store, array $marks): void
    {
        $marks = array_unique($marks);
        foreach ($marks as $i => $markId) {
            $store->storeMarks()->create(['mark_id' => $markId]);
        }
    }

    private function addPayments(Store $store, array $payments): void
    {
        $payments = array_unique($payments);
        foreach ($payments as $i => $paymentId) {
            $store->storePayments()->create(['payment_id' => $paymentId]);
        }
    }

    private function addDiscounts(Store $store, array $discounts): void
    {
        $shopDiscounts = new ShopDiscounts();
        $discounts = array_unique($discounts);
        foreach ($discounts as $i => $discount) {
            $shopDiscounts->create(['store_id' => $store->id,'discount_id' => $discount]);
        }
    }

    private function addDeliveryMethods(Store $store, array $deliveryMethods, $cost, $sort): void
    {
        $deliveryMethods = array_unique($deliveryMethods);
        foreach ($deliveryMethods as $i => $deliveryMethodId) {
            $store->storeDeliveryMethods()->create([
                'delivery_method_id' => $deliveryMethodId,
                'cost' => $cost,
                'sort' => $sort,
            ]);
        }
    }

    public function addWorker(int $id, UserCreateRequest $request): StoreUser
    {
        $store = Store::findOrFail($id);
        DB::beginTransaction();
        try {
            $user = User::new($request->name, $request->email, User::ROLE_USER, $request->password);
            $storeWorker = $store->storeWorkers()->create(['user_id' => $user->id, 'role' => $request->role]);

            DB::commit();

            return $storeWorker;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateWorker(int $id, int $userId, UserUpdateRequest $request): void
    {
        $store = Store::findOrFail($id);
        $user = User::findOrFail($userId);
        $storeWorker = $store->storeWorkers()->where('user_id', $user->id)->firstOrFail();
        DB::beginTransaction();
        try {
            $user->edit($request->name, $request->email, $user->role, $request->status, $request->password);
            DB::table('store_users')->where('store_id', $store->id)
                ->where('user_id', $user->id)
                ->update([
                    'role' => $request->role,
                ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function moveDeliveryMethodToFirst(int $id, int $deliveryMethodId): void
    {
        $store = Store::findOrFail($id);
        $storeDeliveryMethods = $store->storeDeliveryMethods;

        foreach ($storeDeliveryMethods as $i => $storeDeliveryMethod) {
            if ($storeDeliveryMethod->isIdEqualTo($deliveryMethodId)) {
                for ($j = $i; $j >= 0; $j--) {
                    if (!isset($storeDeliveryMethods[$j - 1])) {
                        break(1);
                    }

                    $prev = $storeDeliveryMethods[$j - 1];
                    $storeDeliveryMethods[$j - 1] = $storeDeliveryMethods[$j];
                    $storeDeliveryMethods[$j] = $prev;
                }
                $store->storeDeliveryMethods = $storeDeliveryMethods;

                DB::beginTransaction();
                try {
                    $this->sortDeliveryMethods($store);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveDeliveryMethodUp(int $id, int $deliveryMethodId): void
    {
        $store = Store::findOrFail($id);
        $storeDeliveryMethods = $store->storeDeliveryMethods;

        foreach ($storeDeliveryMethods as $i => $storeDeliveryMethod) {
            if ($storeDeliveryMethod->isIdEqualTo($deliveryMethodId)) {
                if (!isset($storeDeliveryMethods[$i - 1])) {
                    $count = count($storeDeliveryMethods);

                    for ($j = 1; $j < $count; $j++) {
                        $next = $storeDeliveryMethods[$j - 1];
                        $storeDeliveryMethods[$j - 1] = $storeDeliveryMethods[$j];
                        $storeDeliveryMethods[$j] = $next;
                    }
                } else {
                    $previous = $storeDeliveryMethods[$i - 1];
                    $storeDeliveryMethods[$i - 1] = $storeDeliveryMethod;
                    $storeDeliveryMethods[$i] = $previous;
                }
                $store->storeDeliveryMethods = $storeDeliveryMethods;

                DB::beginTransaction();
                try {
                    $this->sortDeliveryMethods($store);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveDeliveryMethodDown(int $id, int $deliveryMethodId): void
    {
        $store = Store::findOrFail($id);
        $storeDeliveryMethods = $store->storeDeliveryMethods;

        foreach ($storeDeliveryMethods as $i => $storeDeliveryMethod) {
            if ($storeDeliveryMethod->isIdEqualTo($deliveryMethodId)) {
                if (!isset($storeDeliveryMethods[$i + 1])) {
                    $last = $storeDeliveryMethods->last();
                    $count = count($storeDeliveryMethods);

                    for ($j = $count - 1; $j > 0; $j--) {
                        $storeDeliveryMethods[$j] = $storeDeliveryMethods[$j - 1];
                    }

                    $storeDeliveryMethods[$j] = $last;
                } else {
                    $next = $storeDeliveryMethods[$i + 1];
                    $storeDeliveryMethods[$i + 1] = $storeDeliveryMethod;
                    $storeDeliveryMethods[$i] = $next;
                }
                $store->storeDeliveryMethods = $storeDeliveryMethods;

                DB::beginTransaction();
                try {
                    $this->sortDeliveryMethods($store);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveDeliveryMethodToLast(int $id, int $deliveryMethodId): void
    {
        $store = Store::findOrFail($id);
        $storeDeliveryMethods = $store->storeDeliveryMethods;

        foreach ($storeDeliveryMethods as $i => $storeDeliveryMethod) {
            if ($storeDeliveryMethod->isIdEqualTo($deliveryMethodId)) {
                $count = count($storeDeliveryMethods);
                for ($j = $i; $j < $count; $j++) {
                    if (!isset($storeDeliveryMethods[$j + 1])) {
                        break(1);
                    }

                    $next = $storeDeliveryMethods[$j + 1];
                    $storeDeliveryMethods[$j + 1] = $storeDeliveryMethods[$j];
                    $storeDeliveryMethods[$j] = $next;
                }
                $store->storeDeliveryMethods = $storeDeliveryMethods;

                DB::beginTransaction();
                try {
                    $this->sortDeliveryMethods($store);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    private function sortDeliveryMethods(Store $store): void
    {
        foreach ($store->storeDeliveryMethods as $i => $storeDeliveryMethod) {
            DB::table('store_delivery_methods')->where('store_id', $store->id)
                ->where('delivery_method_id', $storeDeliveryMethod->delivery_method_id)
                ->update(['sort' => $i + 1]);
        }
    }

    private function uploadLogo(int $storeId, UploadedFile $logo, string $imageName)
    {
        ImageHelper::saveThumbnail($storeId, ImageHelper::FOLDER_STORES, $logo, $imageName);
        ImageHelper::saveOriginal($storeId, ImageHelper::FOLDER_STORES, $logo, $imageName);
    }

    public static function fourProduct($id)
    {
        $products = Product::where(['store_id' => $id])->limit(4)->get();
        return $products;
    }

}
