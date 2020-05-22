<?php

namespace App\Entity;

use App\Entity\Shop\Category;
use App\Entity\Shop\Mark;
use App\Entity\Shop\Product;
use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;

/**
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $slug
 * @property string $logo
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Product[] $products
 * @property StorePayment[] $storePayments
 * @property Payment[] $payments
 * @property StoreMark[] $storeMarks
 * @property Mark[] $marks
 * @property StoreCategory[] $storeCategories
 * @property Category[] $categories
 * @property User[] $workers
 * @property StoreUser[] $storeWorkers
 * @property StoreDeliveryMethod[] $storeDeliveryMethods
 * @property DeliveryMethod[] $deliveryMethods
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @property string $logoThumbnail
 * @property string $logoOriginal
 * @mixin Eloquent
 */
class Store extends BaseModel
{
    protected $table = 'stores';

    protected $fillable = [
        'id', 'name_uz', 'name_ru', 'name_en', 'slug', 'logo',
    ];

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

    public function categoriesList(): array
    {
        $categories = $this->storeCategories();
        if (!$categories->exists()) {
            return [];
        }
        return $categories->pluck('category_id')->toArray();
    }

    public function marksList(): array
    {
        $marks = $this->storeMarks();
        if (!$marks->exists()) {
            return [];
        }
        return $marks->pluck('mark_id')->toArray();
    }

    public function paymentsList(): array
    {
        $payments = $this->storePayments();
        if (!$payments->exists()) {
            return [];
        }
        return $payments->pluck('payment_id')->toArray();
    }

    public function deliveriesList(): array
    {
        $deliveryMethods = $this->storeDeliveryMethods();
        if (!$deliveryMethods->exists()) {
            return [];
        }
        return $deliveryMethods->pluck('delivery_method_id')->toArray();
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function getLogoThumbnailAttribute(): string
    {
        return '/storage/images/' . ImageHelper::FOLDER_STORES . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->logo;
    }

    public function getLogoOriginalAttribute(): string
    {
        return '/storage/images/' . ImageHelper::FOLDER_STORES . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->logo;
    }

    ###########################################


    ########################################### Relations

    public function products()
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }

    public function storePayments()
    {
        return $this->hasMany(StorePayment::class, 'store_id', 'id');
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'store_payments', 'store_id', 'payment_id');
    }

    public function storeMarks()
    {
        return $this->hasMany(StoreMark::class, 'store_id', 'id');
    }

    public function marks()
    {
        return $this->belongsToMany(Mark::class, 'store_marks', 'store_id', 'mark_id');
    }

    public function storeCategories()
    {
        return $this->hasMany(StoreCategory::class, 'store_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'store_categories', 'store_id', 'category_id');
    }

    public function storeWorkers()
    {
        return $this->hasMany(StoreUser::class, 'store_id', 'id');
    }

    public function workers()
    {
        return $this->hasManyThrough(User::class, StoreUser::class, 'store_id', 'user_id', 'id', 'id');
    }

    public function storeDeliveryMethods()
    {
        return $this->hasMany(StoreDeliveryMethod::class, 'store_id', 'id')->orderBy('sort');
    }

    public function deliveryMethods()
    {
        return $this->belongsToMany(DeliveryMethod::class, 'store_delivery_methods', 'store_id', 'delivery_method_id')->orderBy('sort');
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
