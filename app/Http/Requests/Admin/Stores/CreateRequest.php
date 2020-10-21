<?php


namespace App\Http\Requests\Admin\Stores;


use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $slug
 * @property \Illuminate\Http\UploadedFile $logo
 * @property int[] $payments
 * @property int[] $delivery_methods
 * @property int[] $marks
 * @property int[] $categories
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
            'slug' => 'required|string|max:255|unique:stores',
            'logo' => 'required|image|mimes:jpg,jpeg,png',
            'payments.*' => 'numeric|min:1|exists:brands,id',
            'delivery_methods.*' => 'numeric|min:1|exists:delivery_methods,id',
            'marks.*' => 'numeric|min:1|exists:shop_marks,id',
            'categories.*' => 'numeric|min:1|exists:categories,id',
        ];
    }
}
