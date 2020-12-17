<?php

namespace App\Http\Requests\User;

use App\Entity\User\Profile;
use App\Entity\User\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $current_password
 * @property string $new_password
 */
class UpdatePersonalInform extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'address' => 'nullable|string',
            'avatar' => 'nullable|integer',
        ];
    }

}
