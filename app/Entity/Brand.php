<?php

namespace App\Entity;

use App\Entity\Shop\CategoryBrand;
use App\Entity\Shop\Product;
use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

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
 *
 * @mixin Eloquent
 */
class Brand extends BaseModel
{
    use Searchable;

    private $nextStatementId;

    protected $table = 'brands';

    protected $fillable = [
        'id', 'name_uz', 'name_ru', 'name_en', 'slug', 'logo',
    ];

    public function searchableAs(): string
    {
        return 'brands_index';
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name_uz' => $this->name_uz,
            'name_ru' => $this->name_ru,
            'name_en' => $this->name_en,
            'slug' => $this->slug,
            'categories' => $this->categories()->pluck('id')->toArray(),
        ];
    }

    protected function getCacheBaseTags(): array
    {
        return [
            'brands',
        ];
    }

    public static function add(int $id, string $nameUz, string $nameRu, string $nameEn, string $slug, string $logoName): self
    {
        return static::create([
            'id' => $id,
            'name_uz' => $nameUz,
            'name_ru' => $nameRu,
            'name_en' => $nameEn,
            'slug' => $slug,
            'logo' => $logoName,
        ]);
    }

    public function edit(string $nameUz, string $nameRu, string $nameEn, string $slug, string $logoName = null): void
    {
        $this->update([
            'name_uz' => $nameUz,
            'name_ru' => $nameRu,
            'name_en' => $nameEn,
            'slug' => $slug,
            'logo' => $logoName ?: $this->logo,
        ]);
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function getLogoThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_BRANDS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->logo;
    }

    public function getLogoOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_BRANDS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->logo;
    }

    public function getNextIdAttribute(): int
    {
        if (!$this->nextStatementId) {
            $nextId = DB::select("select nextval('brands_id_seq')");
            return $this->nextStatementId = intval($nextId['0']->nextval);
        }
        return $this->nextStatementId;
    }

    ###########################################


    ########################################### Relations

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public function brandCategories()
    {
        return $this->hasMany(CategoryBrand::class, 'brand_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'shop_category_brands', 'brand_id', 'category_id');
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
