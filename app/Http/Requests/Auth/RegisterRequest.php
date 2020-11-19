<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

/**
 * @property string $name
 * @property string $email_or_phone
 * @property string $password
 */
class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email_or_phone' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
