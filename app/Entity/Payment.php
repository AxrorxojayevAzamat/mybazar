<?php

namespace App\Entity;

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
 * @property string $logo
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @property string $logoThumbnail
 * @property string $logoOriginal
 * @mixin Eloquent
 */
class Payment extends BaseModel
{
    protected $table = 'payments';

    protected $fillable = ['id', 'name_uz', 'name_ru', 'name_en', 'logo'];

    public static function add(int $id, string $nameUz, string $nameRu, string $nameEn, string $logoName): self
    {
        return static::create([
            'id' => $id,
            'name_uz' => $nameUz,
            'name_ru' => $nameRu,
            'name_en' => $nameEn,
            'logo' => $logoName,
        ]);
    }

    public function edit(string $nameUz, string $nameRu, string $nameEn, string $logoName = null): void
    {
        $this->update([
            'name_uz' => $nameUz,
            'name_ru' => $nameRu,
            'name_en' => $nameEn,
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
        return '/storage/files/' . ImageHelper::FOLDER_PAYMENTS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->logo;
    }

    public function getLogoOriginalAttribute(): string
    {
        return '/storage/files/' . ImageHelper::FOLDER_PAYMENTS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->logo;
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
