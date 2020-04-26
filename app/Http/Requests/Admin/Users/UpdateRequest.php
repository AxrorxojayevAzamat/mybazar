<?php

namespace App\Http\Requests\Admin\Users;

use App\Entity\User\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'role' => ['required', 'string', Rule::in(array_keys(User::rolesList()))],
            'status' => ['numeric', Rule::in(array_keys(User::statusesList()))],
            'password' => 'string',
        ];
    }
}
