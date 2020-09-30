<?php


namespace App\Http\Requests\Admin\Sliders;


use App\Entity\Slider;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property \Illuminate\Http\UploadedFile $file
 *
 * @property Slider $slider
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
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
