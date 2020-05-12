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
 * @mixin Eloquent
 */
class Modification extends BaseModel
{
    protected $table = 'shop_modifications';

    protected $fillable = [
        'id', 'product_id', 'name_uz', 'name_ru', 'name_en', 'code', 'price_uzs', 'price_usd', 'color', 'photo', 'sort',
    ];

    public static function add(int $id, int $productId, CreateRequest $request, string $photoName): self
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
            'photo' => $photoName,
        ]);
    }

    public function edit(UpdateRequest $request, string $color = null, string $photoName = null): void
    {
        if ($color) {
            $this->color = $color;
            $this->photo = null;
        } elseif ($photoName) {
            $this->color = null;
            $this->photo = $photoName;
        }
        $this->update([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'code' => $request->code,
            'price_uzs' => $request->price_uzs,
            'price_usd' => $request->price_usd,
        ]);
    }

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function getPhotoThumbnailAttribute(): string
    {
        return '/storage/images/' . ImageHelper::FOLDER_MODIFICATIONS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->photo;
    }

    public function getPhotoOriginalAttribute(): string
    {
        return '/storage/images/' . ImageHelper::FOLDER_MODIFICATIONS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->photo;
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
