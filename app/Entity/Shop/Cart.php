<?php

namespace App\Entity\Shop;

use App\Entity\DeliveryMethod;
use App\Entity\User\User;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property int $modification_id
 * @property int $quantity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 * @property Product $product
 * @property Modification $modification
 *
 * @mixin Eloquent
 */
class Cart extends Model
{
    protected $table = 'shop_carts';

    protected $fillable = [
        'user_id', 'product_id', 'modification_id', 'quantity',
    ];


    ########################################### Relations

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function modification()
    {
        return $this->belongsTo(Modification::class, 'modification_id', 'id');
    }

    ###########################################
}
