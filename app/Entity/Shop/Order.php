<?php

namespace App\Entity\Shop;

use App\Entity\DeliveryMethod;
use App\Entity\Payment;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $delivery_method_id
 * @property string $delivery_method_name_uz
 * @property string $delivery_method_name_ru
 * @property string $delivery_method_name_en
 * @property int $delivery_cost
 * @property int $payment_type_id
 * @property int $cost
 * @property string $note
 * @property int $status
 * @property string $cancel_reason
 * @property array $statuses_json
 * @property string $phone
 * @property string $name
 * @property string $delivery_index
 * @property string $delivery_address
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string $deliveryMethodName
 * @property User $user
 * @property DeliveryMethod $deliveryMethod
 * @property Payment $payment
 * @property OrderItem[] $orderItems
 * @property Product[] $items
 *
 * @mixin Eloquent
 */
class Order extends Model
{
    protected $table = 'shop_orders';

    protected $fillable = [
        'user_id', 'delivery_method_id', 'delivery_method_name_uz', 'delivery_method_name_ru', 'delivery_method_name_en', 'delivery_cost',
        'payment_type_id', 'cost', 'note', 'status', 'cancel_reason', 'phone', 'name', 'delivery_index', 'delivery_address',
    ];

    protected $casts = [
        'statuses_json' => 'array',
    ];


    ########################################### Mutators

    public function getDeliveryMethodNameAttribute(): string
    {
        return LanguageHelper::getAttribute($this, 'delivery_method_name') ?? '';
    }

    ###########################################


    ########################################### Relations

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function deliveryMethod()
    {
        return $this->belongsTo(DeliveryMethod::class, 'delivery_method_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function items()
    {
        return $this->hasManyThrough(Product::class, OrderItem::class, 'order_id', 'product_id', 'id', 'id');
    }

    ###########################################
}
