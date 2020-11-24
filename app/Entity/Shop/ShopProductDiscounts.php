<?php

namespace App\Entity\Shop;

use App\Entity\Discount;
use Illuminate\Database\Eloquent\Model;

class ShopProductDiscounts extends Model
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
