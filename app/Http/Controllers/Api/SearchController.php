<?php


namespace App\Http\Controllers\Api;


use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Helpers\PaginateHelper;
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
            $arrayProducts = collect();

            $length = 10;
            $productCategoryIds = [];
            if ($categoryId !== "all"){
                $getCategories = Category::where('id', $categoryId)->first();
                $getCategories = $getCategories->children()->get();

                foreach ($getCategories as $i => $category){
                    $productCategoryIds[$i] = $category->id;
                }
            }
            if ($categoryId && $categoryId !== "all") {
                $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)
                    ->get();
                $products = $products->whereIn('main_category_id', $productCategoryIds)->take(10);
//                $products = array_values($products);



            } else {
                $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)->paginate(10);
            }
            $products->each(function ($product) use ($arrayProducts) {
                $arrayProducts->push($product);
            });
            ProductResource::collection($products);
            if (($length -= $products->count()) <= 0) {
                return response()->json([
                    'products' => $products->toArray(),
                    'brands' => null,
                    'stores' => null,
                ]);
            }

//            if ($categoryId) {
//                $brands = Brand::search($value)->where('categories', $categoryId)->paginate($length);
//            } else {
                $brands = Brand::search($value)->paginate($length);
//            }
            BrandResource::collection($brands);
            if (($length -= $brands->count()) <= 0) {
                return response()->json([
                    'products' => $products->toArray(),
                    'brands' => $brands->toArray(),
                    'stores' => null,
                ]);
            }

//            if ($categoryId) {
//                $stores = Store::search($value)->where('status', Store::STATUS_ACTIVE)
//                    ->where('categories', $categoryId)->paginate($length);
//            } else {
                $stores = Store::search($value)->where('status', Store::STATUS_ACTIVE)->paginate($length);
//            }
            StoreResource::collection($stores);
            return response()->json([
                'products' => $arrayProducts->toArray(),
                'brands' => $brands->toArray(),
                'stores' => $stores->toArray(),
            ]);
        }

        return [];
    }
}
