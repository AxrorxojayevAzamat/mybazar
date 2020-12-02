<?php


namespace App\Http\Requests\Admin\Stores;


use App\Entity\Store;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
 *
 * @property Store $store
 */
class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_uz' => ['required', 'string', 'max:255', 'regex:/^[\w\d\s\'`‘]+$/u'],
            'name_ru' => ['required', 'string', 'max:255', 'regex:/^[\w\d\s]+$/u'],
            'name_en' => ['required', 'string', 'max:255', 'regex:/^[\w\d\s]+$/'],
            'slug' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9-]+$/', Rule::unique('stores')->ignore($this->store->id)],
            'logo' => 'image|mimes:jpeg,png,jpg',
            'payments.*' => 'numeric|min:1|exists:payments,id',
            'delivery_methods.*' => 'numeric|min:1|exists:delivery_methods,id',
            'marks.*' => 'numeric|min:1|exists:shop_marks,id',
            'categories.*' => 'numeric|min:1|exists:categories,id',
        ];
    }
}
