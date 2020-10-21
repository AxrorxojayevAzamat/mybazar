<?php

namespace App\Http\Requests\Admin\Shop\Characteristics;

use App\Entity\Shop\Characteristic;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property int $group_id
 * @property string $type
 * @property string $default
 * @property boolean $required
 * @property string $variants
 * @property boolean $hide_in_filters
 * @property int[] $categories
 *
 * @property Characteristic $characteristic
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
            'group_id' => 'required|numeric|min:1|exists:shop_characteristic_groups,id',
            'type' => ['required', 'string', 'max:255', Rule::in(array_keys(Characteristic::typesList()))],
            'required' => 'boolean',
            'variants' => 'nullable|string',
            'default' => ['required_with:variants', 'nullable', 'string', 'max:255',
                Rule::in(array_values(array_map('trim', preg_split('#[\r\n]+#', $this->variants))))],
            'categories.*' => 'required|numeric|min:1|exists:categories,id',
            'hide_in_filters' => 'boolean',
        ];
    }
}
