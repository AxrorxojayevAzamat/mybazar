<?php

namespace App\Http\Requests\Admin\Stores\Users;

use App\Entity\StoreUser;
use App\Entity\User\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name
 * @property string $email
 * @property string $role
 * @property int $status
 * @property string $password
 *
 * @property User $user
 */
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
            'role' => ['required', 'string', Rule::in(array_keys(StoreUser::rolesList()))],
            'status' => ['numeric', Rule::in(array_keys(User::statusesList()))],
            'password' => 'nullable|string',
        ];
    }
}
