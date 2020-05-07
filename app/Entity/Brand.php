<?php

namespace App\Entity;

use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Support\Facades\DB;

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
 * @property int $nextId
 * @property User $createdBy
 * @property User $updatedBy
 * @mixin Eloquent
 */
class Brand extends BaseModel
{
    private $nextStatementId;

    protected $table = 'brands';

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
            'logo' => $logoName,
        ]);
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    public function getLogoThumbnailAttribute(): string
    {
        return '/storage/images/' . ImageHelper::FOLDER_BRANDS . '/' . $this->id . '/' . ImageHelper::TYPE_THUMBNAIL . '/' . $this->logo;
    }

    public function getLogoOriginalAttribute(): string
    {
        return '/storage/images/' . ImageHelper::FOLDER_BRANDS . '/' . $this->id . '/' . ImageHelper::TYPE_ORIGINAL . '/' . $this->logo;
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
