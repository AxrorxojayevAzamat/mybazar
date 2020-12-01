<?php

namespace App\Entity\Shop;

use App\Entity\BaseModel;
use App\Entity\User\User;
use App\Entity\Category;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property int $group_id
 * @property string $status
 * @property string $type
 * @property string $default
 * @property boolean $required
 * @property array $variants
 * @property boolean $hide_in_filters
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property CharacteristicGroup $group
 * @property CharacteristicCategory[] $characteristicCategories
 * @property Category[] $categories
 * @property Value[] $values
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @method Builder inFilter()
 * @mixin Eloquent
 */
class Characteristic extends BaseModel
{
    public const TYPE_STRING = 'string';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_FLOAT = 'float';
    public const TYPE_COLOR = 'color';

    const STATUS_DRAFT = 0;
    const STATUS_MODERATION = 1;
    const STATUS_ACTIVE = 2;

    protected $table = 'shop_characteristics';

    protected function getCacheBaseTags(): array
    {
        return [
            'shop_characteristics',
        ];
    }

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'group_id', 'status', 'type', 'default', 'required', 'variants', 'hide_in_filters',
    ];

    protected $casts = [
        'variants' => 'array',
    ];


    public function moderate(): void
    {
        if ($this->status !== self::STATUS_MODERATION) {
            throw new \DomainException('Characteristic is not sent to moderation.');
        }
        $this->update([
            'status' => self::STATUS_ACTIVE,
        ]);
    }


    public function draft(): void
    {
        if ($this->status !== self::STATUS_DRAFT) {
            throw new \DomainException('Characteristic is already in draft.');
        }
        $this->update([
            'status' => self::STATUS_DRAFT,
        ]);
    }

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
            self::TYPE_COLOR => 'Color',
        ];
    }

    public function typeName(): string
    {
        return self::typesList()[$this->type];
    }

    public function isDraft(): bool
    {
        return $this->status === self::STATUS_DRAFT;
    }

    public function isOnModeration(): bool
    {
        return $this->status === self::STATUS_MODERATION;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isString(): bool
    {
        return $this->type === self::TYPE_STRING;
    }

    public function isColor(): bool
    {
        return $this->type === self::TYPE_COLOR;
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
        return $this->variants && \count($this->variants) > 0;
    }


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    ###########################################


    ########################################### Scopes

    public function scopeInFilter($query)
    {
        return $query->where('hide_in_filters', false);
    }

    ###########################################


    ########################################### Relations

    public function group()
    {
        return $this->belongsTo(CharacteristicGroup::class, 'group_id', 'id');
    }

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
