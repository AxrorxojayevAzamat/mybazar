<?php


namespace App\Http\Requests\Admin\Shop\Categories;


use App\Entity\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $slug
 * @property int $parent
 * @property UploadedFile $icon
 * @property UploadedFile $photo
 * @property int[] $brands
 *
 * @property Category $category
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
            'slug' => ['required', 'string', 'max:255', Rule::unique('categories')->ignore($this->category->id)],
            'parent' => 'nullable|integer|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png',
            'brands.*' => 'nullable|numeric|min:1|exists:brands,id',
        ];
    }
}
