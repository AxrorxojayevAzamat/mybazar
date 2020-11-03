<?php

namespace App\Helpers;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class JsonHelper
{

    public static function successResponse(string $message, $errors = []): JsonResponse {
        return self::response(Response::HTTP_OK, $message, $errors);
    }

    public static function response(int $code, string $message, $errors = []): JsonResponse {
        return response()->json([
                    'message' => $message,
                    'errors'    => $errors,
                        ], $code);
    }

}
