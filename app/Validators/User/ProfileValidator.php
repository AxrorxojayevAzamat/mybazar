<?php

namespace App\Validators\User;

use App\Validators\BaseValidator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProfileValidator extends BaseValidator
{

    /**
     * @param Request $request
     *
     * @throws ValidationException
     */
    public function validatePassword(Request $request): void {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password'     => 'required|string|min:2',
        ]);
    }

}
