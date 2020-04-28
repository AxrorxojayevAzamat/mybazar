<?php

namespace App\Entity\Shop;

use App\Entity\BaseModel;
use App\Entity\User\User;
use Carbon\Carbon;

/**
 * @property int $id
 * @property int $product_id
 * @property string $file
 * @property int $sort
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Product $product
 * @property User $createdBy
 * @property User $updatedBy
 */
class Photo extends BaseModel
{
    protected $table = 'shop_photos';

    protected $fillable = [
        'product_id', 'file', 'sort',
    ];


    ########################################### Relations

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    ###########################################


}
