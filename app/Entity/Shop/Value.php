<?php

namespace App\Entity\Shop;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $product_id
 * @property int $characteristic_id
 * @property string $value
 * @property boolean $main
 * @property int $sort
 *
 * @property Product $product
 * @property Characteristic $characteristic
 * @mixin Eloquent
 */
class Value extends Model
{
    protected $table = 'shop_values';

    public $incrementing = false;
    protected $primaryKey = ['product_id', 'characteristic_id'];
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'characteristic_id', 'value', 'main', 'sort',
    ];

    public function isCharacteristicIdEqualTo(int $characteristicId): bool
    {
        return $this->characteristic_id === $characteristicId;
    }

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }


    ########################################### Relations

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function characteristic()
    {
        return $this->belongsTo(Characteristic::class, 'characteristic_id', 'id');
    }

    ###########################################


}
