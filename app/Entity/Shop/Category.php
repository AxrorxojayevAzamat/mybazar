<?php

namespace App\Entity\Shop;

use App\Entity\BaseModel;
use App\Entity\Store;
use App\Entity\StoreCategory;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Kalnoy\Nestedset\NodeTrait;

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
 * @property integer $created_by
 * @property integer $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property int $depth
 * @property Category $parent
 * @property Category[] $children
 * @property ProductCategory[] $categoryProducts
 * @property Product[] $products
 * @property StoreCategory[] $categoryStores
 * @property Store[] $stores
 * @property CharacteristicCategory[] $categoryCharacteristics
 * @property Characteristic[] $characteristics
 * @property string $name
 * @property User $createdBy
 * @property User $updatedBy
 * @mixin Eloquent
 */
class Category extends BaseModel
{
    use NodeTrait;

    protected $table = 'shop_categories';

    protected $fillable = ['name_uz', 'name_ru', 'name_en', 'description_uz', 'description_ru', 'description_en', 'slug', 'parent_id'];


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    ###########################################


    ########################################### For Nested Set

    public function getLftName(): string
    {
        return 'left';
    }

    public function getRgtName(): string
    {
        return 'right';
    }

    ###########################################


    ########################################### Relations

    public function categoryProducts()
    {
        return $this->hasMany(ProductCategory::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'shop_product_categories', 'category_id', 'product_id');
    }

    public function categoryStores()
    {
        return $this->hasMany(StoreCategory::class, 'category_id', 'id');
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_categories', 'category_id', 'store_id');
    }

    public function categoryCharacteristics()
    {
        return $this->hasMany(CharacteristicCategory::class, 'category_id', 'id');
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class, 'shop_characteristic_categories', 'category_id', 'characteristic_id');
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