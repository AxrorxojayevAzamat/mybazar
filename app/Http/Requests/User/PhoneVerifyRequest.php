<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $token
 */
class PhoneVerifyRequest extends FormRequest {

    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone_verify_token' => 'required|string|max:255',
            'phone' => 'required|string|min:12|max:12',
        ];
    }

}
