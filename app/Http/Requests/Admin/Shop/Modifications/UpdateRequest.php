<?php


namespace App\Http\Requests\Admin\Shop\Modifications;


use App\Entity\Shop\Modification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $code
 * @property int $price_uzs
 * @property float $price_usd
 * @property string $value
 * @property string $color
 * @property UploadedFile $photo
 *
 * @property Modification $modification
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
            'code' => ['required', 'string', 'max:15', Rule::unique('shop_modifications')->ignore($this->modification->id)],
            'price_uzs' => 'required|numeric|min:0',
            'price_usd' => 'required|numeric|min:0',
            'value' => 'required_without_all:color,photo|string|max:50',
            'color' => ['required_without_all:photo,value', 'nullable', /*'regex:#[a-zA-Z0-9]{6}', */'regex:(#([a-fA-F0-9]{6})|rgba\((\d{1,3}?,\s?){3}(1|0?\.\d+)\))'],
            'photo' => 'required_without_all:color,value|nullable|image|mimes:jpg,jpeg,png',
        ];
    }
}
