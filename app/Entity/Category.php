<?php

namespace App\Entity;

use App\Entity\BaseModel;
use App\Entity\Brand;
use App\Entity\Store;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductCategory;
use App\Entity\Shop\CharacteristicCategory;
use App\Entity\Shop\Characteristic;
use App\Entity\Shop\CategoryBrand;
use App\Entity\StoreCategory;
use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use App\Http\Requests\Admin\Shop\Categories\CreateRequest;
use App\Http\Requests\Admin\Shop\Categories\UpdateRequest;
use Carbon\Carbon;
use Eloquent;
use Kalnoy\Nestedset\NodeTrait;
use Rennokki\QueryCache\Traits\QueryCacheable;

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
 *
 * @mixin Eloquent
 */
class Category extends BaseModel
{
    use NodeTrait;

    public $cacheFor = 0;

    protected $table = 'categories';

    protected $fillable = [
        'id', 'name_uz', 'name_ru', 'name_en', 'description_uz', 'description_ru', 'description_en',
        'slug', 'parent_id', 'icon', 'photo',
    ];

    protected function getCacheBaseTags(): array
    {
        return [
            'categories',
        ];
    }

    public static function add(int $id, CreateRequest $request, string $photoName, string $iconName): self
    {
        return static::create([
            'id' => $id,
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'parent_id' => $request->parent,
            'slug' => $request->slug,
            'photo' => $photoName,
            'icon' => $iconName,
        ]);
    }

    public function edit(UpdateRequest $request): void
    {
        $this->update([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'parent_id' => $request->parent,
            'slug' => $request->slug,
        ]);
    }

    public function setPhoto(string $photoName): void
    {
        $this->photo = $photoName;
    }

    public function setIcon(string $iconName): void
    {
        $this->icon = $iconName;
    }

    public function getPath(): string
    {
        return implode('/', array_merge($this->ancestors()->defaultOrder()->pluck('slug')->toArray(), [$this->slug]));
    }

    public function brandsList(): array
    {
        return $this->categoryBrands()->pluck('brand_id')->toArray();
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function getDescriptionAttribute(): string
    {
        return LanguageHelper::getDescription($this);
    }

    public function getPhotoThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_CATEGORIES . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->photo;
    }

    public function getPhotoOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_CATEGORIES . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->photo;
    }

    public function getIconThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_CATEGORIES . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->icon;
    }

    public function getIconOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_CATEGORIES . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->icon;
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

    public function mainProducts()
    {
        return $this->hasMany(Product::class, 'main_category_id', 'id');
    }

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

    public function categoryBrands()
    {
        return $this->hasMany(CategoryBrand::class, 'category_id', 'id');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'shop_category_brands', 'category_id', 'brand_id');
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
