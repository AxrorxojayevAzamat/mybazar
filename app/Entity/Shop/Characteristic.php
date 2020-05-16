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
 * @property string $type
 * @property string $default
 * @property boolean $required
 * @property array $variants
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property CharacteristicCategory[] $characteristicCategories
 * @property Category[] $categories
 * @property Value[] $values
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @mixin Eloquent
 */
class Characteristic extends BaseModel
{
    public const TYPE_STRING = 'string';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_FLOAT = 'float';

    protected $table = 'shop_characteristics';

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'type', 'default', 'required', 'variants',
    ];

    protected $casts = [
        'variants' => 'array',
    ];

    public function categoriesList(): array
    {
        return $this->characteristicCategories()->pluck('category_id')->toArray();
    }

    public static function typesList(): array
    {
        return [
            self::TYPE_STRING => 'String',
            self::TYPE_INTEGER => 'Integer',
            self::TYPE_FLOAT => 'Float',
        ];
    }

    public function typeName(): string
    {
        return self::typesList()[$this->type];
    }

    public function isString(): bool
    {
        return $this->type === self::TYPE_STRING;
    }

    public function isInteger(): bool
    {
        return $this->type === self::TYPE_INTEGER;
    }

    public function isFloat(): bool
    {
        return $this->type === self::TYPE_FLOAT;
    }

    public function isNumber(): bool
    {
        return $this->isInteger() || $this->isFloat();
    }

    public function isSelect(): bool
    {
        return \count($this->variants) > 0;
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    ###########################################


    ########################################### Relations

    public function characteristicCategories()
    {
        return $this->hasMany(CharacteristicCategory::class, 'characteristic_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'shop_characteristic_categories', 'characteristic_id', 'category_id');
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
