<?php


namespace App\Http\Requests\Admin\Sliders;


use Illuminate\Foundation\Http\FormRequest;

/**
 * @property \Illuminate\Http\UploadedFile $file
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
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
