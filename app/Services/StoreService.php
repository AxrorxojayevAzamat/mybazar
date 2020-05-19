<?php


namespace App\Services;


use App\Entity\Store;
use App\Entity\StoreUser;
use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\stores\CreateRequest;
use App\Http\Requests\Admin\stores\UpdateRequest;
use App\Http\Requests\Admin\Stores\Users\CreateRequest as UserCreateRequest;
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
                ]);
            }

            $imageName = ImageHelper::getRandomName($request->logo);
            $store = Store::add($this->getNextId(), $request->name_uz, $request->name_ru, $request->name_en, $request->slug, $imageName);

            $this->addCategories($store, $request->categories);
            $this->addMarks($store, $request->marks);
            $this->addPayments($store, $request->payments);

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

                Storage::disk('public')->deleteDirectory('/images/' . ImageHelper::FOLDER_STORES . '/' . $store->id);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
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

    private function updateRelations(Store $store, UpdateRequest $request): void
    {
        $store->storeCategories()->delete();
        $this->addCategories($store, $request->categories);

        $store->storeMarks()->delete();
        $this->addMarks($store, $request->marks);

        $store->storePayments()->delete();
        $this->addPayments($store, $request->payments);
    }

    private function addCategories(Store $store, array $categories): void
    {
        $categories = array_unique($categories);
        foreach ($categories as $i => $categoryId) {
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

    public function updateWorker(int $id, UserCreateRequest $request): void
    {
        $store = Store::findOrFail($id);
        DB::beginTransaction();
        try {
            $user = User::new($request->name, $request->email, User::ROLE_USER, $request->password);
            $storeWorker = $store->storeWorkers()->create(['user_id' => $user->id, 'role' => $request->role]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function uploadLogo(int $storeId, UploadedFile $logo, string $imageName)
    {
        ImageHelper::saveThumbnail($storeId, ImageHelper::FOLDER_STORES, $logo, $imageName);
        ImageHelper::saveOriginal($storeId, ImageHelper::FOLDER_STORES, $logo, $imageName);
    }
}
