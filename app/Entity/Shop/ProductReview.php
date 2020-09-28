<?php

namespace App\Entity\Shop;

use App\Entity\User\User;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property int $product_id
 * @property float $rating
 * @property string $advantages
 * @property string $disadvantages
 * @property string $comment
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Product $product
 * @property User $user
 * @mixin Eloquent
 */
class ProductReview extends Model
{
    protected $table = 'shop_product_reviews';

    protected $fillable = [
        'product_id', 'rating', 'advantages', 'disadvantages', 'comment',
    ];

    public static function boot()
    {
        parent::boot();

        if ($user = Auth::user()) {
            static::creating(function ($model) use ($user) {
                $model->user_id = $model->user_id ?? $user->id;
            });

            static::updating(function ($model) use ($user) {
                $model->updated_at = Carbon::now();
            });

            static::saving(function ($model) use ($user) {
                $model->user_id = $model->user_id ?? $user->id;
                $model->updated_at = Carbon::now();
            });
        }
    }


    ########################################### Relations

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    ###########################################
}
