<?php


namespace App\Http\Requests\Admin\Pages;


use App\Entity\Blog\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $title_uz
 * @property string $title_ru
 * @property string $title_en
 * @property string $menu_title_uz
 * @property string $menu_title_ru
 * @property string $menu_title_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $body_uz
 * @property string $body_ru
 * @property string $body_en
 * @property int $parent_id
 * @property int $slug
 */
class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'menu_title_uz' => 'nullable|string|max:255',
            'menu_title_ru' => 'nullable|string|max:255',
            'menu_title_en' => 'nullable|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'body_uz' => 'required|string',
            'body_ru' => 'required|string',
            'body_en' => 'required|string',
            'parent_id' => 'nullable|integer|min:1|exists:pages,id',
            'slug' => 'required|string|max:255',
        ];
    }
}
