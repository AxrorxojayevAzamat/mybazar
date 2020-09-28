<?php

namespace App\Http\Requests\Admin\Shop\Categories;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $slug
 * @property int $parent
 * @property int[] $brands
 */
class CreateRequest extends FormRequest
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
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'slug' => 'required|string|max:255',
            'parent' => 'nullable|integer|exists:shop_categories,id',
            'brands.*' => 'numeric|min:1|exists:brands,id',
        ];
    }
}
