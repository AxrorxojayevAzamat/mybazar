<?php

namespace App\Entity\Shop;

use App\Entity\User\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property float $rating
 * @property string $comment
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Product $product
 * @property User $createdBy
 * @property User $updatedBy
 */
class ProductReviews extends Model
{
    protected $table = 'shop_product_reviews';

    protected $fillable = [
        'product_id', 'rating', 'comment',
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
