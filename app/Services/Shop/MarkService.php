<?php


namespace App\Services\Shop;


use App\Entity\Shop\Mark;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Shop\Marks\CreateRequest;
use App\Http\Requests\Admin\Shop\Marks\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MarkService
{
    private $nextId;

    public function create(CreateRequest $request): Mark
    {
        if (!$request->photo) {
            return Mark::create([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'slug' => $request->slug,
            ]);
        }

        $imageName = ImageHelper::getRandomName($request->photo);
        $mark = Mark::add($this->getNextId(), $request->name_uz, $request->name_ru, $request->name_en, $request->slug, $imageName);

        $this->uploadPhoto($this->getNextId(), $request->photo, $imageName);

        return $mark;
    }

    public function update(int $id, UpdateRequest $request): Mark
    {
        $mark = Mark::findOrFail($id);

        if (!$request->photo) {
            $mark->edit($request->name_uz, $request->name_ru, $request->name_en, $request->slug);
        } else {
            Storage::disk('public')->deleteDirectory('/images/' . ImageHelper::FOLDER_MARKS . '/' . $mark->id);

            $imageName = ImageHelper::getRandomName($request->photo);
            $mark->edit($request->name_uz, $request->name_ru, $request->name_en, $request->slug, $imageName);

            $this->uploadPhoto($mark->id, $request->photo, $imageName);
        }

        return $mark;
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('shop_marks_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removePhoto(int $id): bool
    {
        $mark = Mark::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/images/' . ImageHelper::FOLDER_MARKS . '/' . $mark->id) && $mark->update(['photo' => null]);
    }

    private function uploadPhoto(int $markId, UploadedFile $photo, string $imageName)
    {
        ImageHelper::saveThumbnail($markId, ImageHelper::FOLDER_MARKS, $photo, $imageName);
        ImageHelper::saveOriginal($markId, ImageHelper::FOLDER_MARKS, $photo, $imageName);
    }
}
