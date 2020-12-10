<?php


namespace App\Http\Requests\Admin\Discounts;


use App\Entity\Discount;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property int $category_id
 * @property bool $common
 * @property int $status
 * @property \Illuminate\Http\UploadedFile $photo
 *
 * @property Dicount $discount
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
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
            'category_id' => 'required|numeric|min:1|exists:categories,id',
            'common' => 'boolean',
            'status' => ['numeric', Rule::in(array_keys(Discount::statusesList()))],
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
