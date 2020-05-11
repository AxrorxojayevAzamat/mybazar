<?php

namespace App\Http\Requests\Admin\Shop\Marks;

use App\Entity\Shop\Mark;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $slug
 * @property \Illuminate\Http\UploadedFile $photo
 *
 * @property Mark $mark
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
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', Rule::unique('shop_marks')->ignore($this->mark->id)],
            'photo' => 'image|mimes:jpeg,png,jpg',
        ];
    }
}
