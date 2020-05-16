<?php

namespace App\Entity\Shop;

use App\Entity\BasePivot;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;

/**
 * @property int $characteristic_id
 * @property int $category_id
 *
 * @property Characteristic $characteristic
 * @property Category $category
 * @mixin Eloquent
 */
class CharacteristicCategory extends BasePivot
{
    protected $table = 'shop_characteristic_categories';

    protected $fillable = [
        'characteristic_id', 'category_id'
    ];


    ########################################### Mutators

    public function getNameAttribute(): string
    {
        return LanguageHelper::getName($this);
    }

    ###########################################


    ########################################### Relations

    public function characteristic()
    {
        return $this->belongsTo(Characteristic::class, 'characteristic_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    ###########################################
}
