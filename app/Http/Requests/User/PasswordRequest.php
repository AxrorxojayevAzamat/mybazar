<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $current_password
 * @property string $new_password
 */
class PasswordRequest extends FormRequest {

    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_password' => 'required',
            'new_password'     => 'required|string|min:2',
        ];
    }

}
