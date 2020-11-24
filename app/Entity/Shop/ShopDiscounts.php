<?php

namespace App\Entity\Shop;

use App\Entity\BasePivot;
use App\Entity\Discount;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                use App\Entity\Store;

class ShopDiscounts extends BasePivot
{
    protected $table = 'shop_discounts';

    protected $fillable = ['store_id', 'discount_id'];


    ########################################### Relations

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'id');
    }


}
