<?php

namespace App\Services\Manage;

use App\Entity\Slider;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Sliders\CreateRequest;
use App\Http\Requests\Admin\Sliders\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderService
{

    private $nextId;

    public function create(CreateRequest $request): Slider
    {

        if (!$request->file) {
            return Slider::create([
                'sort' => $request->sort,
                'url' => $request->url,
            ]);
        }

        $imageName = ImageHelper::getRandomName($request->file);
        $post = Slider::add($this->getNextId(), $request, $imageName);

        $this->uploadFile($this->getNextId(), $request->file, $imageName);

        return $post;
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('sliders_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    private function uploadFile(int $sliderId, UploadedFile $file, string $imageName): void
    {
        ImageHelper::saveThumbnail($sliderId, ImageHelper::FOLDER_SLIDERS, $file, $imageName);
        ImageHelper::saveOriginal($sliderId, ImageHelper::FOLDER_SLIDERS, $file, $imageName);
    }

    public function update(int $id, UpdateRequest $request): Slider
    {
        $slider = Slider::findOrFail($id);

        if (!$request->file) {
            $slider->edit($request);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_SLIDERS . '/' . $slider->id);

            $imageName = ImageHelper::getRandomName($request->file);
            $slider->edit($request, $imageName);

            $this->uploadFile($slider->id, $request->file, $imageName);
        }

        return $slider;
    }

    public function moveSliderToFirst($sliders, int $sliderId): void
    {

        /* @var $slider Slider */
        foreach ($sliders as $i => $slider) {
            if ($slider->isIdEqualTo($sliderId)) {
                for ($j = $i; $j >= 0; $j--) {
                    if (!isset($sliders[$j - 1])) {
                        break(1);
                    }

                    $prev = $sliders[$j - 1];
                    $sliders[$j - 1] = $sliders[$j];
                    $sliders[$j] = $prev;
                }


                DB::beginTransaction();
                try {
                    $this->sortSliders($sliders);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    private function sortSliders($sliders): void
    {
        foreach ($sliders as $i => $slider) {
            $slider->setSort($i + 1);
            $slider->saveOrFail();
        }
    }

    public function moveSliderUp($sliders, int $sliderId): void
    {

        /* @var $slider Slider */
        foreach ($sliders as $i => $slider) {
            if ($slider->isIdEqualTo($sliderId)) {
                if (!isset($sliders[$i - 1])) {
                    $count = count($sliders);

                    for ($j = 1; $j < $count; $j++) {
                        $next = $sliders[$j - 1];
                        $sliders[$j - 1] = $sliders[$j];
                        $sliders[$j] = $next;
                    }
                } else {
                    $previous = $sliders[$i - 1];
                    $sliders[$i - 1] = $slider;
                    $sliders[$i] = $previous;
                }

                DB::beginTransaction();
                try {
                    $this->sortSliders($sliders);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveSliderDown($sliders, int $sliderId): void
    {

        /* @var $slider Slider */
        foreach ($sliders as $i => $slider) {
            if ($slider->isIdEqualTo($sliderId)) {
                if (!isset($sliders[$i + 1])) {
                    $last = $sliders->last();
                    $count = count($sliders);

                    for ($j = $count - 1; $j > 0; $j--) {
                        $sliders[$j] = $sliders[$j - 1];
                    }

                    $sliders[$j] = $last;
                } else {
                    $next = $sliders[$i + 1];
                    $sliders[$i + 1] = $slider;
                    $sliders[$i] = $next;
                }

                DB::beginTransaction();
                try {
                    $this->sortSliders($sliders);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveSliderToLast($sliders, int $sliderId): void
    {

        /* @var $slider Slider */
        foreach ($sliders as $i => $slider) {
            if ($slider->isIdEqualTo($sliderId)) {
                $count = count($sliders);
                for ($j = $i; $j < $count; $j++) {
                    if (!isset($sliders[$j + 1])) {
                        break(1);
                    }

                    $next = $sliders[$j + 1];
                    $sliders[$j + 1] = $sliders[$j];
                    $sliders[$j] = $next;
                }

                DB::beginTransaction();
                try {
                    $this->sortSliders($sliders);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function removeFile(int $id): bool
    {
        $slider = Slider::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_SLIDERS . '/' . $slider->id) && $slider->update(['file' => null]);
    }

}
