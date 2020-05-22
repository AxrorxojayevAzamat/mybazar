<?php

namespace App\Entity;

/**
 * @property int $store_id
 * @property int $delivery_method_id
 * @property int $sort
 *
 * @property Store $store
 * @property DeliveryMethod $deliveryMethod
 */
class StoreDeliveryMethod extends BasePivot
{
    protected $table = 'store_delivery_methods';

    protected $fillable = ['store_id', 'delivery_method_id', 'sort'];

    public function isIdEqualTo($deliveryMethodId): bool
    {
        return $this->delivery_method_id === $deliveryMethodId;
    }


    ########################################### Relations

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function deliveryMethod()
    {
        return $this->belongsTo(DeliveryMethod::class, 'delivery_method_id', 'id');
    }

    ###########################################
}
