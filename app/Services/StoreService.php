<?php


namespace App\Services;


use App\Entity\Store;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\stores\CreateRequest;
use App\Http\Requests\Admin\stores\UpdateRequest;
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

    private function updateRelations(Store $store, UpdateRequest $request)
    {
        $store->storeCategories()->delete();
        $this->addCategories($store, $request->categories);

        $store->storeMarks()->delete();
        $this->addMarks($store, $request->marks);

        $store->storePayments()->delete();
        $this->addPayments($store, $request->payments);
    }

    private function addCategories(Store $store, array $categories)
    {
        $categories = array_unique($categories);
        foreach ($categories as $i => $categoryId) {
            $store->storeCategories()->create(['category_id' => $categoryId]);
        }
    }

    private function addMarks(Store $store, array $marks)
    {
        $marks = array_unique($marks);
        foreach ($marks as $i => $markId) {
            $store->storeMarks()->create(['mark_id' => $markId]);
        }
    }

    private function addPayments(Store $store, array $payments)
    {
        $payments = array_unique($payments);
        foreach ($payments as $i => $paymentId) {
            $store->storePayments()->create(['payment_id' => $paymentId]);
        }
    }

    private function uploadLogo(int $storeId, UploadedFile $logo, string $imageName)
    {
        ImageHelper::saveThumbnail($storeId, ImageHelper::FOLDER_STORES, $logo, $imageName);
        ImageHelper::saveOriginal($storeId, ImageHelper::FOLDER_STORES, $logo, $imageName);
    }
}
