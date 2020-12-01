<?php

namespace App\Entity\Shop;

use App\Entity\Discount;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $product_id
 * @property int $discount_id
 *
 * @property Product $product
 * @property Discount $discount
 *
 * @mixin Eloquent
 */
class ProductDiscount extends Model
{
    protected $table = 'shop_product_discounts';

    protected $fillable = ['product_id', 'discount_id'];


    ########################################### Relations

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'id');
    }

}
