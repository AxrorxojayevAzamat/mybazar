<?php

namespace App\Http\Resources;

use App\Entity\Category;
use App\Entity\DeliveryMethod;
use App\Entity\Payment;
use App\Entity\Shop\Mark;
use App\Entity\Shop\Product;
use App\Entity\StoreCategory;
use App\Entity\StoreDeliveryMethod;
use App\Entity\StoreMark;
use App\Entity\StorePayment;
use App\Entity\StoreUser;
use App\Entity\User\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $slug
 * @property string $logo
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Product[] $products
 * @property StorePayment[] $storePayments
 * @property Payment[] $payments
 * @property StoreMark[] $storeMarks
 * @property Mark[] $marks
 * @property StoreCategory[] $storeCategories
 * @property Category[] $categories
 * @property User[] $workers
 * @property StoreUser[] $storeWorkers
 * @property StoreDeliveryMethod[] $storeDeliveryMethods
 * @property DeliveryMethod[] $deliveryMethods
 * @property User $createdBy
 * @property User $updatedBy
 *
 * @property string $name
 * @property string $logoThumbnail
 * @property string $logoOriginal
 */
class StoreResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'logo' => $this->when($this->logo, $this->logoOriginal),
            'status' => $this->status,
        ];
    }
}
