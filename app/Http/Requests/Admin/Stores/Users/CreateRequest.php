<?php

namespace App\Http\Requests\Admin\Stores\Users;

use App\Entity\StoreUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name
 * @property string $email
 * @property string $role
 * @property string $password
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => ['required', 'string', Rule::in(array_keys(StoreUser::rolesList()))],
            'password' => 'required|string',
        ];
    }
}
