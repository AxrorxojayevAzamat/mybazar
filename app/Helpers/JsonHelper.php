<?php

namespace App\Helpers;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class JsonHelper
{

    //success
    public static function successResponse(string $message, $errors = []): JsonResponse
    {
        return self::response(Response::HTTP_OK, $message, $errors);
    }

    //error
    public static function badResponse(string $message, $errors = []): JsonResponse
    {
        return self::response(Response::HTTP_BAD_REQUEST, $message, $errors);
    }

    //exception
    public static function exceptionResponse(string $message, $errors = []): JsonResponse
    {
        return self::response(Response::HTTP_CONFLICT, $message, $errors);
    }

    public static function response(int $code, string $message, $errors = []): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }

}
