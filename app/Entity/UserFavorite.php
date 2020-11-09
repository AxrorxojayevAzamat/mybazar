<?php


namespace App\Entity;

use App\Entity\User\User;
use App\Entity\Shop\Product;
use Eloquent;

/**
 * @property int $user_id
 * @property int $product_id
 *
 * @property User $user
 * @property Product $product
 * @mixin Eloquent
 */
class UserFavorite extends BasePivot
{
    protected $table = 'user_favorites';

    protected $fillable = ['user_id', 'product_id'];


    ########################################### Relations

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


    ###########################################


}
