<?php


namespace App\Http\Requests\Admin\Blog\Posts;


use App\Entity\Blog\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $title_uz
 * @property string $title_ru
 * @property string $title_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $body_uz
 * @property string $body_ru
 * @property string $body_en
 * @property int $category_id
 * @property int $status
 * @property \Illuminate\Http\UploadedFile $file
 *
 * @property Post $post
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
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'body_uz' => 'required|string',
            'body_ru' => 'required|string',
            'body_en' => 'required|string',
            'category_id' => 'required|numeric|min:1|exists:categories,id',
            'status' => ['required', 'numeric', Rule::in(array_keys(Post::statusList()))],
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
