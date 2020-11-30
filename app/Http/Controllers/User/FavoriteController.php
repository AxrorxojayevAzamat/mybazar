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

    public function __construct(UserService $service, FilterService $filterService)
    {

        $this->service = $service;
        $this->filterService = $filterService;
    }

    public function favorites(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->guest('login');
        }
        $productIds = UserFavorite::where('user_id', Auth::user()->id)->pluck('product_id')->toArray();
        $categoryIds = ProductCategory::whereIn('product_id', $productIds)->pluck('category_id')->toArray();
        $categorys = $this->filterService->categorysList($categoryIds);
        $query = $this->filterService->productById($productIds,$request);
        $products = $query->paginate(20);

        $ratings = [];
        foreach($products as $i => $product) {
            $ratings[$i] = [
                'id' => $product->id,
                'rating' => $product->rating,
            ];
        }

        return view('user.favorites', compact('categorys', 'products', 'ratings'));
    }

    public function addToFavorite(Product $product)
    {
        try {
            $userFavorite = $this->service->addToFavorite(Auth::user()->id, $product);
            if (!empty($userFavorite)) {
                return JsonHelper::successResponse('Product added successfully to Favorite!');
            }
            return JsonHelper::badResponse('Product not added to Favorite!');
        } catch (\Exception $e) {
            return JsonHelper::exceptionResponse($e->getMessage());
        }
    }

    public function removeFromFavorite(Request $request)
    {
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
