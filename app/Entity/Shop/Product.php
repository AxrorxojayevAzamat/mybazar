<?php

namespace App\Entity\Shop;

use App\Entity\BaseModel;
use App\Entity\Brand;
use App\Entity\Discount;
use App\Entity\Store;
use App\Entity\Category;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use App\Entity\UserFavorite;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

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
 * @property ProductDiscount[] $productDiscounts
 * @property Discount[] $discounts
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @property string $description
 * @property int $currentPriceUzs
 * @property int $currentPriceUsd
 * @property int $discountExpiresAt
 * @method Builder active()
 * @mixin Eloquent
 */
class Product extends BaseModel
{
    use Searchable;

    public const STATUS_DRAFT = 0;
    public const STATUS_MODERATION = 1;
    public const STATUS_ACTIVE = 2;
    public const STATUS_CLOSED = 3;
    public const STATUS_DRAFT_CATEGORY_SPLITTED = 7;

    protected $table = 'shop_products';

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'description_uz', 'description_ru', 'description_en', 'slug', 'main_photo_id',
        'price_uzs', 'price_usd', 'discount', 'discount_ends_at', 'main_category_id', 'store_id', 'brand_id', 'status',
        'weight', 'quantity', 'guarantee', 'bestseller', 'new',
    ];

    protected $casts = [
        'discount_ends_at' => 'datetime',
    ];

    public function searchableAs(): string
    {
        return 'shop_products_index';
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name_uz' => $this->name_uz,
            'name_ru' => $this->name_ru,
            'name_en' => $this->name_en,
            'description_uz' => $this->description_uz,
            'description_ru' => $this->description_ru,
            'description_en' => $this->description_en,
            'slug' => $this->slug,
            'main_photo_original' => optional($this->mainPhoto)->fileOriginal,
            'main_photo_thumbnail' => optional($this->mainPhoto)->fileThumbnail,
            'price_uzs' => $this->price_uzs,
            'price_usd' => $this->price_usd,
            'status' => $this->status,
            'category_id' => $this->main_category_id,
            'brand_id' => $this->brand_id,
            'store_id' => $this->store_id,
        ];
    }

    public function shouldBeSearchable(): bool
    {
        return $this->isActive();
    }

    public function sendToModeration(): void
    {
        if (!$this->isDraft() && !$this->isClosed()) {
            throw new \DomainException('Product is not draft or closed.');
        }

        if (!$this->main_photo_id) {
            throw new \DomainException('Upload main photo.');
        }

        $this->update([
            'status' => self::STATUS_MODERATION,
        ]);
    }

    public function moderate(): void
    {
        if ($this->status !== self::STATUS_MODERATION) {
            throw new \DomainException('Product is not sent to moderation.');
        }
        $this->update([
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public function activate(): void
    {
        if ($this->status !== self::STATUS_ACTIVE) {
            throw new \DomainException('Product is already activated.');
        } else if ($this->status !== self::STATUS_DRAFT_CATEGORY_SPLITTED) {
            throw new \DomainException('Product is not drafted after main category split.');
        }
        $this->update([
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public function draft(): void
    {
        if ($this->status === self::STATUS_DRAFT) {
            throw new \DomainException('Product is already draft.');
        }
        $this->update([
            'status' => self::STATUS_DRAFT,
        ]);
    }

    public function close(): void
    {
        if ($this->status === self::STATUS_CLOSED) {
            throw new \DomainException('Product is already closed.');
        }
        $this->update([
            'status' => self::STATUS_CLOSED,
        ]);
    }

    public function setStatusCategorySplitted(): void
    {
        $this->status = self::STATUS_DRAFT_CATEGORY_SPLITTED;
    }

    public function isDraft(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function isOnModeration(): bool
    {
        return $this->status === self::STATUS_MODERATION;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isClosed(): bool
    {
        return $this->status === self::STATUS_CLOSED;
    }

    public function isDraftAfterCategorySplit(): bool
    {
        return $this->status === self::STATUS_DRAFT_CATEGORY_SPLITTED;
    }

    public function categoriesList(): array
    {
        return $this->productCategories()->pluck('category_id')->toArray();
    }

    public function marksList(): array
    {
        return $this->productMarks()->pluck('mark_id')->toArray();
    }

    public function discountsList(): array
    {
        return $this->productDiscounts()->pluck('discount_id')->toArray();
    }


    ########################################### Photos
    ###########################################


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function getDescriptionAttribute(): string
    {
        return LanguageHelper::getDescription($this);
    }

    public function getCurrentPriceUzsAttribute(): int
    {
        return $this->price_uzs - ($this->price_uzs * $this->discount);
    }

    public function getCurrentPriceUsdAttribute(): int
    {
        return $this->price_usd - ($this->price_usd * $this->discount);
    }

    public function getDiscountExpiresAtAttribute(): int
    {
        return strtotime($this->discount_ends_at) - time();
    }

    public function classFavorite($id): bool
    {
        return Auth::user() && UserFavorite::where('user_id', Auth::user()->id)->where(['product_id' => $id])->exists();
    }

    ###########################################


    ########################################### Scopes

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    ###########################################


    ########################################### Relations

    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'main_category_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function mainPhoto()
    {
        return $this->belongsTo(Photo::class, 'main_photo_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'product_id', 'id')
            ->whereKeyNot($this->main_photo_id)->orderBy('sort');
    }

    public function allPhotos()
    {
        return $this->hasMany(Photo::class, 'product_id', 'id')->orderBy('sort');
    }

    public function mainValues()
    {
        return $this->values()->where('main', true);
    }

    public function values()
    {
        return $this->hasMany(Value::class, 'product_id', 'id')->orderBy('sort');
    }

    public function modifications()
    {
        return $this->hasMany(Modification::class, 'product_id', 'id')->orderBy('sort');
    }

    public function valueModifications()
    {
        return $this->hasMany(Modification::class, 'product_id', 'id')
            ->where('type', Modification::TYPE_VALUE)->orderBy('sort');
    }

    public function colorModifications()
    {
        return $this->hasMany(Modification::class, 'product_id', 'id')
            ->where('type', Modification::TYPE_COLOR)->orderBy('sort');
    }

    public function photoModifications()
    {
        return $this->hasMany(Modification::class, 'product_id', 'id')
            ->where('type', Modification::TYPE_PHOTO)->orderBy('sort');
    }

    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class, 'product_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'shop_product_categories', 'product_id', 'category_id');
    }

    public function productMarks()
    {
        return $this->hasMany(ProductMark::class, 'product_id', 'id');
    }

    public function marks()
    {
        return $this->belongsToMany(Mark::class, 'shop_product_marks', 'product_id', 'mark_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    public function productDiscounts()
    {
        return $this->hasMany(ProductDiscount::class, 'product_id', 'id');
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'shop_product_discounts', 'product_id', 'discount_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function userFavorites()
    {
        return $this->hasMany(UserFavorite::class, 'product_id', 'id');
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'user_favorites', 'product_id', 'user_id');
    }

    ###########################################
}
