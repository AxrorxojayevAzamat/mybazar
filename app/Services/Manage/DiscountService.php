<?php

namespace App\Services\Manage;

use App\Entity\Category;
use App\Entity\Discount;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Discounts\CreateRequest;
use App\Http\Requests\Admin\Discounts\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DiscountService {

    private $nextId;

    public function create(CreateRequest $request): Discount {
        $category = Category::findOrFail($request->category_id);

        if (!$request->photo) {
            return Discount::create([
                        'name_uz' => $request->name_uz,
                        'name_ru' => $request->name_ru,
                        'name_en' => $request->name_en,
                        'description_uz' => $request->description_uz,
                        'description_ru' => $request->description_ru,
                        'description_en' => $request->description_en,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'category_id' => $category->id,
                        'common' => $request->common,
                        'status' => $request->status,
            ]);
        }

        $imageName = ImageHelper::getRandomName($request->photo);
        $discount = Discount::add($this->getNextId(), $request, $category->id, $imageName);

        $this->uploadPhoto($this->getNextId(), $request->photo, $imageName);

        return $discount;
    }

    public function update(int $id, UpdateRequest $request): Discount {
        $discount = Discount::findOrFail($id);
        $category = Category::findOrFail($request->category_id);

        if (!$request->photo) {
            $discount->edit($request, $category->id);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_DISCOUNTS . '/' . $discount->id);

            $imageName = ImageHelper::getRandomName($request->photo);
            $discount->edit($request, $category->id, $imageName);

            $this->uploadPhoto($discount->id, $request->photo, $imageName);
        }

        return $discount;
    }

    public function getNextId(): int {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('discounts_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removePhoto(int $id): bool {
        $discount = Discount::findOrFail($id);
        return Storage::disk('public')->delete('/files/' . ImageHelper::FOLDER_DISCOUNTS . '/' . $discount->id . '/' . $discount->photo) && $discount->update(['photo' => null]);
    }

    private function uploadPhoto(int $discountId, UploadedFile $file, string $photoName): void {
        ImageHelper::saveThumbnail($discountId, ImageHelper::FOLDER_DISCOUNTS, $file, $photoName);
        ImageHelper::saveOriginal($discountId, ImageHelper::FOLDER_DISCOUNTS, $file, $photoName);
    }

}
