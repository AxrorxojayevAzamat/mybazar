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
    const TYPE_VALUE = 1;
    const TYPE_COLOR = 2;
    const TYPE_PHOTO = 3;

    protected $table = 'shop_modifications';

    protected $fillable = [
        'id', 'product_id', 'name_uz', 'name_ru', 'name_en', 'code', 'price_uzs', 'price_usd', 'type', 'value',
        'color', 'photo', 'sort',
    ];

    public static function add(int $id, int $productId, CreateRequest $request, int $type, string $photoName): self
    {
        return static::create([
            'id' => $id,
            'product_id' => $productId,
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'code' => $request->code,
            'price_uzs' => $request->price_uzs,
            'price_usd' => $request->price_usd,
            'type' => $type,
            'photo' => $photoName,
        ]);
    }

    public function edit(UpdateRequest $request, string $value = null, string $color = null, string $photoName = null): void
    {
        $type = $this->type;
        if ($color) {
            $this->value = null;
            $this->color = $color;
            $this->photo = null;
            $type = self::TYPE_COLOR;
        } elseif ($value) {
            $this->value = $value;
            $this->color = null;
            $this->photo = null;
            $type = self::TYPE_VALUE;
        } elseif ($photoName) {
            $this->value = null;
            $this->color = null;
            $this->photo = $photoName;
            $type = self::TYPE_PHOTO;
        }
        $this->update([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'code' => $request->code,
            'price_uzs' => $request->price_uzs,
            'price_usd' => $request->price_usd,
            'type' => $type,
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

    public static function typeList(): array
    {
        return [
            self::TYPE_VALUE => trans('adminlte.value.name'),
            self::TYPE_COLOR => trans('adminlte.color'),
            self::TYPE_PHOTO => trans('adminlte.photo.name'),
        ];
    }

    public function typeName(): string
    {
        return self::typeList()[$this->type];
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
