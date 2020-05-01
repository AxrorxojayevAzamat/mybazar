<?php

namespace App\Entity\Shop;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;

/**
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property int $category_id
 * @property string $type
 * @property boolean $main
 * @property int $sort
 * @property string $default
 * @property boolean $required
 * @property array $variants
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Category $category
 * @property Value[] $values
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @mixin Eloquent
 */
class Characteristic extends BaseModel
{
    protected $table = 'shop_characteristics';

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'category_id', 'type', 'main', 'sort', 'default', 'required', 'variants'
    ];


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    ###########################################


    ########################################### Relations

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function values()
    {
        return $this->hasMany(Value::class, 'characteristic_id', 'id');
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
