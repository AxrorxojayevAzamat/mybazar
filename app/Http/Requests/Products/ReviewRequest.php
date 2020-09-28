<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $rating
 * @property string $advantages
 * @property string $disadvantages
 * @property string $comment
 */
class ReviewRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'rating' => 'required|integer|min:1|max:5',
            'advantages' => 'nullable|string',
            'disadvantages' => 'nullable|string',
            'comment' => 'required|string',
        ];
    }

}
