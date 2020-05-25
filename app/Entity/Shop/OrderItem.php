<?php

namespace App\Entity\Shop;

use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $modification_id
 * @property string $product_name_uz
 * @property string $product_name_ru
 * @property string $product_name_en
 * @property string $product_code
 * @property string $modification_name_uz
 * @property string $modification_name_ru
 * @property string $modification_name_en
 * @property string $modification_code
 * @property int $price
 * @property int $quantity
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $productName
 * @property string $modificationName
 * @property Order $order
 * @property Product $product
 * @property Modification $modification
 *
 * @mixin Eloquent
 */
class OrderItem extends Model
{
    protected $table = 'shop_order_items';

    protected $fillable = [
        'order_id', 'product_id', 'modification_id', 'product_name_uz', 'product_name_ru', 'product_name_en', 'product_code',
        'modification_name_uz', 'modification_name_ru', 'modification_name_en', 'modification_code', 'price', 'quantity',
    ];


    ########################################### Mutators

    public function getProductNameAttribute(): string
    {
        return LanguageHelper::getAttribute($this, 'product_name') ?? '';
    }

    public function getModificationNameAttribute(): string
    {
        return LanguageHelper::getAttribute($this, 'modification_name') ?? '';
    }

    ###########################################


    ########################################### Relations

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
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
