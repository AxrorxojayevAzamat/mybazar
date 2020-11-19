<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

/**
 * @property int $token
 * @property string $phone
 */
class VerifyPhoneRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'token' => 'required|numeric|between:10000,99999',
            'phone' => 'required|string|regex:/^\+?998[0-9]{9}$/',
        ];
    }
}
