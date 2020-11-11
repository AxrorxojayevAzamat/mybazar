<?php

namespace App\Http\Resources;

use App\Entity\Category;
use App\Entity\Shop\CategoryBrand;
use App\Entity\Shop\Product;
use App\Entity\User\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property integer $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $slug
 * @property array $meta_json
 * @property string $logo
 * @property integer $created_by
 * @property integer $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $name
 * @property string $logoThumbnail
 * @property string $logoOriginal
 *
 * @property Product[] $products
 * @property CategoryBrand[] $brandCategories
 * @property Category[] $categories
 * @property User $createdBy
 * @property User $updatedBy
 */
class BrandResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'logo' => $this->when($this->logo, $this->logoOriginal),
        ];
    }
}
