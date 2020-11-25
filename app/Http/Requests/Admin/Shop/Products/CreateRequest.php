<?php

namespace App\Http\Requests\Admin\Shop\Products;

use App\Helpers\ProductHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $slug
 * @property int $price_uzs
 * @property float $price_usd
 * @property float $discount
 * @property Carbon $discount_ends_at_date
 * @property Carbon $discount_ends_at_time
 * @property int $main_category_id
 * @property int $store_id
 * @property int $brand_id
 * @property int $weight
 * @property int $quantity
 * @property boolean $guarantee
 * @property boolean $bestseller
 * @property boolean $new
 * @property int[] $categories
 * @property int[] $marks
 * @property int[] $discounts
 */
class CreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'slug' => 'required|string|max:255|unique:shop_products',
            'price_uzs' => 'required|numeric|min:0',
            'price_usd' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'discount_ends_at_date' => 'nullable|date_format:Y-m-d',
            'discount_ends_at_time' => 'nullable|date_format:H:i',
            'main_category_id' => 'required|numeric|min:1|exists:categories,id',
            'store_id' => 'required|numeric|min:1|exists:stores,id',
            'brand_id' => 'required|numeric|min:1|exists:brands,id',
//            'status' => ['required', 'numeric', Rule::in(array_keys(ProductHelper::getStatusList()))],
            'weight' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|numeric|min:0',
            'guarantee' => 'boolean',
            'bestseller' => 'boolean',
            'new' => 'boolean',
            'categories.*' => 'required|numeric|min:1|exists:categories,id',
            'marks.*' => 'numeric|min:1|exists:shop_marks,id',
            'discounts.*' => 'numeric|min:1|exists:discounts,id',
        ];
    }
}
