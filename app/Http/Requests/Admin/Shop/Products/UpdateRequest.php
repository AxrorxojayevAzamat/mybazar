<?php

namespace App\Http\Requests\Admin\Shop\Products;

use App\Helpers\ProductHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'slug' => 'required|string|max:255',
            'price_uzs' => 'required|numeric|min:0',
            'price_usd' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'store_id' => 'required|numeric|min:1',
            'brand_id' => 'required|numeric|min:1',
            'status' => ['required', 'numeric', Rule::in(array_keys(ProductHelper::getStatusList()))],
            'weight' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|numeric|min:0',
            'guarantee' => 'required|boolean',
            'bestseller' => 'required|boolean',
            'new' => 'required|boolean',
            'categories.*' => 'required|numeric|min:1',
        ];
    }
}
