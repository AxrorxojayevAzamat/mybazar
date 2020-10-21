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
 * @property int $order
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Characteristic[] $characteristics
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @mixin Eloquent
 */
class CharacteristicGroup extends BaseModel
{
    protected $table = 'shop_characteristic_groups';

    protected $fillable = ['name_uz', 'name_ru', 'name_en', 'order'];


    public function setOrder(int $order): void
    {
        $this->order = $order;
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

    ###########################################


    ########################################### Relations

    public function characteristics()
    {
        return $this->hasMany(Characteristic::class, 'group_id', 'id');
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
