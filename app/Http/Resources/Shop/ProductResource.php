<?php

namespace App\Http\Resources\Shop;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Shop\Mark;
use App\Entity\Shop\Modification;
use App\Entity\Shop\Photo;
use App\Entity\Shop\ProductCategory;
use App\Entity\Shop\ProductMark;
use App\Entity\Shop\ProductReview;
use App\Entity\Shop\Value;
use App\Entity\Store;
use App\Entity\User\User;
use App\Entity\UserFavorite;
use App\Http\Resources\StoreResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $slug
 * @property string $main_photo_id
 * @property int $price_uzs
 * @property float $price_usd
 * @property float $discount
 * @property Carbon $discount_ends_at
 * @property int $main_category_id
 * @property int $store_id
 * @property int $brand_id
 * @property int $status
 * @property int $weight
 * @property int $quantity
 * @property boolean $guarantee
 * @property boolean $bestseller
 * @property boolean $new
 * @property float $rating
 * @property int $number_of_reviews
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Store $store
 * @property Brand $brand
 * @property Photo $mainPhoto
 * @property Photo[] $photos
 * @property Photo[] $allPhotos
 * @property Value[] $values
 * @property Value[] $mainValues
 * @property Modification[] $modifications
 * @property Modification[] $valueModifications
 * @property Modification[] $colorModifications
 * @property Modification[] $photoModifications
 * @property ProductCategory[] $productCategories
 * @property Category $mainCategory
 * @property Category[] $categories
 * @property ProductMark[] $productMarks
 * @property Mark[] $marks
 * @property ProductReview[] $reviews
 * @property UserFavorite[] $userFavorites
 * @property User[] $favorites
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @property string $description
 * @property int $currentPriceUzs
 * @property int $currentPriceUsd
 * @property int $discountExpiresAt
 */
class ProductResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'main_photo' => $this->when($this->main_photo_id !== null, $this->main_photo_id !== null ? $this->mainPhoto->fileOriginal : ''),
            'price_uzs' => $this->price_uzs,
            'current_price_uzs' => $this->currentPriceUzs,
            'discount' => $this->discount,
            'discount_ends_at' => $this->discount_ends_at,
            'category' => new CategoryResource($this->mainCategory),
            'store' => new StoreResource($this->store),
            'brand' => new StoreResource($this->brand),
            'status' => $this->status,
            'weight' => $this->weight,
            'quantity' => $this->quantity,
            'guarantee' => $this->guarantee,
            'bestseller' => $this->bestseller,
            'new' => $this->new,
            'rating' => $this->rating,
            'number_of_reviews' => $this->number_of_reviews,
        ];
    }
}
