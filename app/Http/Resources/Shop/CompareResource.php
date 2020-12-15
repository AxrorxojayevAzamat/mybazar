<?php

namespace App\Http\Resources\Shop;

use App\Entity\Shop\Photo;
use Illuminate\Http\Resources\Json\JsonResource;

class CompareResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     * @property string $name_ru
     * @property string $name_en
     * @property Photo $mainPhoto
     * @property Photo[] $photos
     * @property Photo[] $allPhotos
     * @property int $id
     * @property string $name_uz
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price_uzs' => $this->price_uzs,
            'main_photo' => $this->when($this->main_photo_id !== null, $this->main_photo_id !== null ? $this->mainPhoto->fileOriginal : ''),

        ];
    }
}
