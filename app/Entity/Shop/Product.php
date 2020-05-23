<?php

namespace App\Entity\Shop;

use App\Entity\BaseModel;
use App\Entity\Brand;
use App\Entity\Store;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;

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
 * @property Modification[] $modifications
 * @property ProductCategory[] $productCategories
 * @property Category[] $categories
 * @property ProductMark[] $productMarks
 * @property Mark[] $marks
 * @property ProductReview[] $reviews
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @mixin Eloquent
 */
class Product extends BaseModel
{
    const STATUS_DRAFT = 0;
    const STATUS_MODERATION = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_CLOSED = 3;

    protected $table = 'shop_products';

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'description_uz', 'description_ru', 'description_en', 'slug', 'main_photo_id',
        'price_uzs', 'price_usd', 'discount', 'store_id', 'brand_id', 'status', 'weight', 'quantity', 'guarantee',
        'bestseller', 'new',
    ];


    public function isDraft(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function isModeration(): bool
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

    public function categoriesList(): array
    {
        return $this->productCategories()->pluck('category_id')->toArray();
    }

    public function marksList(): array
    {
        return $this->productMarks()->pluck('mark_id')->toArray();
    }


    ########################################### Photos



    ###########################################


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    ###########################################


    ########################################### Relations

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
        return $this->hasMany(Photo::class, 'product_id', 'id')->whereKeyNot($this->main_photo_id)->orderBy('sort');
    }

    public function allPhotos()
    {
        return $this->hasMany(Photo::class, 'product_id', 'id')->orderBy('sort');
    }

    public function values()
    {
        return $this->hasMany(Value::class, 'product_id', 'id')->orderBy('sort');
    }

    public function modifications()
    {
        return $this->hasMany(Modification::class, 'product_id', 'id')->orderBy('sort');
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

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    ###########################################





}
