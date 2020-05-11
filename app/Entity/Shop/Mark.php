<?php

namespace App\Entity\Shop;

use App\Entity\BaseModel;
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
 * @property string $photo
 * @property array $meta_json
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @property string $photoThumbnail
 * @property string $photoOriginal
 * @mixin Eloquent
 */
class Mark extends BaseModel
{
    protected $table = 'shop_marks';

    protected $fillable = [
        'id', 'name_uz', 'name_ru', 'name_en', 'slug', 'photo',
    ];

    public static function add(int $id, string $nameUz, string $nameRu, string $nameEn, string $slug, string $photoName): self
    {
        return static::create([
            'id' => $id,
            'name_uz' => $nameUz,
            'name_ru' => $nameRu,
            'name_en' => $nameEn,
            'slug' => $slug,
            'photo' => $photoName,
        ]);
    }

    public function edit(string $nameUz, string $nameRu, string $nameEn, string $slug, string $photoName = null): void
    {
        $this->update([
            'name_uz' => $nameUz,
            'name_ru' => $nameRu,
            'name_en' => $nameEn,
            'slug' => $slug,
            'photo' => $photoName ?: $this->photo,
        ]);
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function getPhotoThumbnailAttribute(): string
    {
        return '/storage/images/' . ImageHelper::FOLDER_MARKS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->photo;
    }

    public function getPhotoOriginalAttribute(): string
    {
        return '/storage/images/' . ImageHelper::FOLDER_MARKS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->photo;
    }

    ###########################################


    ########################################### Relations

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
