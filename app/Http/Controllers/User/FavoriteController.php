<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use App\Helpers\JsonHelper;

class FavoriteController extends Controller
{

    private $service;

    public function __construct(UserService $service) {
        $this->middleware('can:manage-profile');
        $this->service = $service;
    }

    public function favorites() {
        return view('user.favorites');
    }

    public function addToFavorite(Request $request) {
        try {
            $userFavorite = $this->service->addToFavorite(Auth::user()->id, $request);
            if (!empty($userFavorite)) {
                return JsonHelper::successResponse('Product added successfully to Favorite!');
            }
            return JsonHelper::badResponse('Product not added to Favorite!');
        } catch (\Exception $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        }
    }

    public function removeFromFavorite(Request $request) {
        try {
            if ($this->service->removeFromFavorite(Auth::user()->id, $request)) {
                return JsonHelper::successResponse('Product deleted successfully from Favorite!');
            }
            return JsonHelper::badResponse('Product not deleted from Favorite!');
        } catch (\Exception $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        }
    }

}
