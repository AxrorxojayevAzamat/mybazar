<?php

namespace App\Http\Requests\Admin\Banners;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $title_uz
 * @property string $title_ru
 * @property string $title_en
 * @property string $description_uz
 * @property string $description_ru
 * @property string $description_en
 * @property string $url
 * @property string $slug
 * @property bool $is_published
 * @property \Illuminate\Http\UploadedFile $file
 */
class CreateRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_uz' => 'required|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'url' => 'required|string',
            'slug' => 'required|string|max:255|unique:banners',
            'is_published' => 'boolean',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

}
