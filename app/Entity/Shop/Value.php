<?php

namespace App\Entity\Shop;

use App\Entity\BaseModel;

/**
 * @property int $product_id
 * @property int $characteristic_id
 * @property string $value
 *
 * @property Product $product
 * @property Characteristic $characteristic
 */
class Value extends BaseModel
{
    protected $table = 'shop_values';

    protected $fillable = [
        'product_id', 'characteristic_id', 'value',
    ];


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
