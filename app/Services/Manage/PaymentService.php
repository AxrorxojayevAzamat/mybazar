<?php


namespace App\Services\Manage;


use App\Entity\Payment;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Payments\CreateRequest;
use App\Http\Requests\Admin\Payments\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentService
{
    private $nextId;

    public function create(CreateRequest $request): Payment
    {
        if (!$request->logo) {
            return Payment::create([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
            ]);
        }

        $imageName = ImageHelper::getRandomName($request->logo);
        $payment = Payment::add($this->getNextId(), $request->name_uz, $request->name_ru, $request->name_en, $imageName);

        ImageHelper::uploadResizedImage($this->getNextId(), ImageHelper::FOLDER_PAYMENTS, $request->logo, $imageName);

        return $payment;
    }

    public function update(int $id, UpdateRequest $request): Payment
    {
        $payment = Payment::findOrFail($id);

        if (!$request->logo) {
            $payment->edit($request->name_uz, $request->name_ru, $request->name_en, $request->slug);
        } else {
            Storage::disk('public')->deleteDirectory('/images/' . ImageHelper::FOLDER_PAYMENTS . '/' . $payment->id);

            $imageName = ImageHelper::getRandomName($request->logo);
            $payment->edit($request->name_uz, $request->name_ru, $request->name_en, $imageName);

            ImageHelper::uploadResizedImage($payment->id, ImageHelper::FOLDER_PAYMENTS, $request->logo, $imageName);
        }

        return $payment;
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('payments_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removeLogo(int $id): bool
    {
        $payment = Payment::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/images/' . ImageHelper::FOLDER_PAYMENTS . '/' . $payment->id) && $payment->update(['logo' => null]);
    }

    private function uploadLogo(int $paymentId, UploadedFile $logo, string $imageName)
    {
        $sizes = getimagesize($logo);

        ImageHelper::saveThumbnail($paymentId, ImageHelper::FOLDER_PAYMENTS, $logo, $imageName, (int) ($sizes[0] / 4), (int) ($sizes[1] / 4));
        ImageHelper::saveOriginal($paymentId, ImageHelper::FOLDER_PAYMENTS, $logo, $imageName);
    }
}
