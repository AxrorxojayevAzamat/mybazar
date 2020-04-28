<?php

namespace App\Entity\Shop;

use App\Entity\BaseModel;
use App\Entity\Brand;
use App\Entity\Store;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;

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
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Store $store
 * @property Brand $brand
 * @property Photo $mainPhoto
 * @property Photo[] $photos
 * @property Value[] $values
 * @property Modification[] $modifications
 * @property ProductCategory[] $productCategories
 * @property ProductMark[] $productMarks
 * @property ProductReviews[] $productReviews
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 */
class Product extends BaseModel
{
    protected $table = 'shop_products';

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'description_uz', 'description_ru', 'description_en', 'slug', 'main_photo_id',
        'price_uzs', 'price_usd', 'discount', 'store_id', 'brand_id', 'status', 'weight', 'quantity', 'guarantee',
        'bestseller', 'new', 'rating',
    ];


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
        return $this->hasMany(Photo::class, 'product_id', 'id');
    }

    public function values()
    {
        return $this->hasMany(Value::class, 'product_id', 'id');
    }

    public function modifications()
    {
        return $this->hasMany(Modification::class, 'product_id', 'id');
    }

    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class, 'product_id', 'id');
    }

    public function productMarks()
    {
        return $this->hasMany(ProductMark::class, 'product_id', 'id');
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReviews::class, 'product_id', 'id');
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
