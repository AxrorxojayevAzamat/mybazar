<?php

namespace App\Http\Controllers;

use App\Entity\Brand;
use App\Entity\Store;
use App\Http\Resources\BrandResource;
use App\Http\Resources\Shop\ProductResource;
use App\Http\Resources\StoreResource;
use Illuminate\Http\Request;
use App\Entity\Shop\Product;
use App\Models\Post;
use App\Models\Videos;
use App\Models\VideosCategory;

class SearchResultsController extends Controller
{
    public function searchResults(Request $request) {
        if (!empty($value = $request->get('search'))) {
            $categoryId = $request->get('category_id');

            $length = 10;
            if ($categoryId) {
                $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)
                    ->where('category_id', $categoryId)->paginate(10);
            } else {
                $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)->paginate(10);
            }


            if ($categoryId) {
                $brands = Brand::search($value)->where('categories', $categoryId)->paginate($length);
            } else {
                $brands = Brand::search($value)->paginate($length);
            }


            if ($categoryId) {
                $stores = Store::search($value)->where('status', Store::STATUS_ACTIVE)
                    ->where('categories', $categoryId)->paginate($length);
            } else {
                $stores = Store::search($value)->where('status', Store::STATUS_ACTIVE)->paginate($length);
            }
        }

        return view('pages.search-results', compact('stores', 'brands', 'products'));
    }

}
