<?php

namespace App\Http\Requests\Admin\Users;

use App\Entity\User\User;
use App\Entity\User\Profile;
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
            'password' => 'nullable|string',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date_format:Y-m-d',
            'gender' => ['numeric', Rule::in(array_keys(Profile::gendersList()))],
            'address' => 'nullable|string',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
