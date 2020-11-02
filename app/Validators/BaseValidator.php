<?php


namespace App\Validators;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class BaseValidator
{
    protected function validate(Request $request, $rules, callable $callback = NULL)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if ($callback !== NULL) {
                $callback($validator);
            }
            throw new ValidationException($validator, Response::HTTP_UNPROCESSABLE_ENTITY, $validator->errors());
        }
    }
}
