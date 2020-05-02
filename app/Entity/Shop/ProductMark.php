<?php

namespace App\Entity\Shop;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $product_id
 * @property int $mark_id
 *
 * @property Product $product
 * @property Mark $mark
 */
class ProductMark extends Pivot
{
    protected $table = 'shop_product_marks';

    protected $fillable = [
        'product_id', 'mark_id',
    ];


    ########################################### Relations

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function mark()
    {
        return $this->belongsTo(Mark::class, 'mark_id', 'id');
    }

    ###########################################
}
