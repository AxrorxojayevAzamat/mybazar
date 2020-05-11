<?php


namespace App\Entity;

use App\Entity\Shop\Mark;

/**
 * @property int $store_id
 * @property int $mark_id
 *
 * @property Store $store
 * @property Mark $mark
 */
class StoreMark extends BasePivot
{
    protected $table = 'store_marks';

    protected $fillable = ['store_id', 'mark_id'];


    ########################################### Relations

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function mark()
    {
        return $this->belongsTo(Mark::class, 'mark_id', 'id');
    }

    ###########################################
}
