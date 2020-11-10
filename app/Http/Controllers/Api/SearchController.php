<?php


namespace App\Http\Controllers\Api;


use App\Entity\Brand;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Http\Resources\BrandResource;
use App\Http\Resources\Shop\ProductResource;
use App\Http\Resources\StoreResource;
use Illuminate\Http\Request;

class SearchController
{
    public function search(Request $request)
    {
        if (!empty($value = $request->get('search'))) {
            $categoryId = $request->get('category_id');

            $length = 10;
            if ($categoryId) {
                $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)
                    ->where('category_id', $categoryId)->paginate(10);
            } else {
                $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)->paginate(10);
            }
            ProductResource::collection($products);
            if (($length -= $products->count()) <= 0) {
                return response()->json([
                    'products' => $products->toArray(),
                    'brands' => null,
                    'stores' => null,
                ]);
            }

            if ($categoryId) {
                $brands = Brand::search($value)->where('categories', $categoryId)->paginate($length);
            } else {
                $brands = Brand::search($value)->paginate($length);
            }
            BrandResource::collection($brands);
            if (($length -= $brands->count()) <= 0) {
                return response()->json([
                    'products' => $products->toArray(),
                    'brands' => $brands->toArray(),
                    'stores' => null,
                ]);
            }

            if ($categoryId) {
                $stores = Store::search($value)->where('status', Store::STATUS_ACTIVE)
                    ->where('categories', $categoryId)->paginate($length);
            } else {
                $stores = Store::search($value)->where('status', Store::STATUS_ACTIVE)->paginate($length);
            }
            StoreResource::collection($stores);
            return response()->json([
                'products' => $products->toArray(),
                'brands' => $brands->toArray(),
                'stores' => $stores->toArray(),
            ]);
        }

        return [];
    }
}
