<?php

namespace App\Entity\Shop;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use App\Http\Requests\Admin\Shop\Modifications\CreateRequest;
use App\Http\Requests\Admin\Shop\Modifications\UpdateRequest;
use Carbon\Carbon;
use Eloquent;

/**
 * @property int $id
 * @property int $product_id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $code
 * @property int $characteristic_id
 * @property int $price_uzs
 * @property float $price_usd
 * @property int $type
 * @property string $value
 * @property string $color
 * @property string $photo
 * @property string $sort
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Product $product
 * @property Characteristic $characteristic
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @property string $photoThumbnail
 * @property string $photoOriginal
 * @property int $currentPriceUzs
 * @property int $currentPriceUsd
 * @mixin Eloquent
 */
class Modification extends BaseModel
{

    protected $table = 'shop_modifications';

    protected $fillable = [
        'id', 'product_id', 'name_uz', 'name_ru', 'name_en', 'code', 'price_uzs', 'price_usd', 'value', 'sort', 'characteristic_id',
    ];

    public static function add(int $id, int $productId, CreateRequest $request, string $photoName): self
    {
        return static::create([
            'id' => $id,
            'product_id' => $productId,
            'characteristic_id' => $request->characteristic_id,
            'value' => $request->value ? $request->value : ($request->characteristic_value ?? null),
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'code' => $request->code,
            'price_uzs' => $request->price_uzs,
            'price_usd' => $request->price_usd,
            'photo' => $photoName,
            'sort' => 1000,
        ]);
    }

    public function editValue(UpdateRequest $request): void
    {
        $this->value = $request->value;
        $this->photo = null;

        $this->edit($request);
    }

    public function editCharacteristicValue(UpdateRequest $request)
    {
        $this->value = $request->characteristic_value;
        $this->photo = null;

        $this->edit($request);
    }

    public function editColor(UpdateRequest $request)
    {
        $this->value = null;
        $this->photo = null;

        $this->edit($request);
    }

    public function editPhoto(UpdateRequest $request, $photoName)
    {
        $this->value = null;
        $this->photo = $photoName;

        $this->edit($request);
    }

    public function edit(UpdateRequest $request)
    {
        $this->update([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'code' => $request->code,
            'characteristic_id' => $request->characteristic_id,
            'price_uzs' => $request->price_uzs,
            'price_usd' => $request->price_usd,
        ]);
    }

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }

    public function isIdEqualTo($id): bool
    {
        return $this->id == $id;
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function getPhotoThumbnailAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_MODIFICATIONS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->photo;
    }

    public function getPhotoOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_MODIFICATIONS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->photo;
    }

    public function getCurrentPriceUzsAttribute(): int
    {
        return $this->price_uzs - ($this->price_uzs * $this->product->discount);
    }

    public function getCurrentPriceUsdAttribute(): int
    {
        return $this->price_usd - ($this->price_usd * $this->product->discount);
    }

    ###########################################


    ########################################### Relations

    public function characteristic()
    {
        return $this->belongsTo(Characteristic::class, 'characteristic_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
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
