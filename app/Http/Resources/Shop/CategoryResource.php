<?php

namespace App\Http\Resources\Shop;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Shop\CategoryBrand;
use App\Entity\Shop\Characteristic;
use App\Entity\Shop\CharacteristicCategory;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductCategory;
use App\Entity\Store;
use App\Entity\StoreCategory;
use App\Entity\User\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property integer $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $slug
 * @property array $meta_json
 * @property integer $left
 * @property integer $right
 * @property integer|null $parent_id
 * @property string $photo
 * @property string $icon
 * @property integer $created_by
 * @property integer $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property int $depth
 * @property Category $parent
 * @property Category[] $children
 * @property ProductCategory[] $categoryProducts
 * @property Product[] $mainProducts
 * @property Product[] $products
 * @property StoreCategory[] $categoryStores
 * @property Store[] $stores
 * @property CharacteristicCategory[] $categoryCharacteristics
 * @property Characteristic[] $characteristics
 * @property CategoryBrand[] $categoryBrands
 * @property Brand[] $brands
 * @property string $name
 * @property string $description
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $photoThumbnail
 * @property string $photoOriginal
 * @property string $iconThumbnail
 * @property string $iconOriginal
 */
class CategoryResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'parent' => $this->when($this->parent_id !== null, new CategoryResource($this->parent)),
            'photo' => $this->when($this->photo, $this->photoOriginal),
            'icon' => $this->when($this->icon, $this->iconOriginal),
        ];
    }
}
