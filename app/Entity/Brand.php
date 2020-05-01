<?php

namespace App\Entity;

use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;

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
 * @property User $createdBy
 * @property User $updatedBy
 * @mixin Eloquent
 */
class Brand extends BaseModel
{

    protected $table = 'brands';

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'slug', 'logo',
    ];


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
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
