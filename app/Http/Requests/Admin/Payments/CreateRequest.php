<?php


namespace App\Http\Requests\Admin\Payments;


use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property \Illuminate\Http\UploadedFile $logo
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
            'logo' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }
}
