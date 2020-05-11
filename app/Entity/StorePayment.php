<?php


namespace App\Entity;

/**
 * @property int $store_id
 * @property int $payment_id
 *
 * @property Store $store
 * @property Payment $payment
 */
class StorePayment extends BasePivot
{
    protected $table = 'store_payments';

    protected $fillable = ['store_id', 'payment_id'];


    ########################################### Relations

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    ###########################################
}
