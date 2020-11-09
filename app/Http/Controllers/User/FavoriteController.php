<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use App\Services\Manage\FilterService;
use App\Helpers\JsonHelper;
use App\Entity\UserFavorite;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductCategory;


class FavoriteController extends Controller
{

    private $service;
    private $filterService;

    public function __construct(UserService $service, FilterService $filterService) {
        $this->middleware('can:manage-profile');
        $this->service       = $service;
        $this->filterService = $filterService;
    }

    public function favorites(Request $request) {

        $productIds  = UserFavorite::where('user_id', Auth::user()->id)->pluck('product_id')->toArray();
        $categoryIds = ProductCategory::whereIn('product_id', $productIds)->pluck('category_id')->toArray();

        $brands             = $this->filterService->brandByCategoryId($categoryIds);
        $stores             = $this->filterService->storeByCategoryId($categoryIds);
        $groupModifications = $this->filterService->groupModificationByCategoryId($categoryIds);
        $query              = $this->filterService->productById($productIds, $request);
        $products  = $query->paginate(20);
        $min_price = Product::select('price_uzs')->min('price_uzs');
        $max_price = Product::select('price_uzs')->max('price_uzs');
        
       
        return view('user.favorites', compact('category', 'products', 'brands', 'stores', 'groupModifications', 'min_price', 'max_price'));
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
