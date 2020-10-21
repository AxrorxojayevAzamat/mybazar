<?php


namespace App\Http\Requests\Admin\DeliveryMethods;


use App\Entity\Category;
use App\Entity\DeliveryMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property int $cost
 * @property float $min_weight
 * @property float $max_weight
 *
 * @property DeliveryMethod $deliveryMethod
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
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'cost' => 'required|numeric',
            'min_weight' => 'required|numeric',
            'max_weight' => 'required|numeric',
        ];
    }
}
