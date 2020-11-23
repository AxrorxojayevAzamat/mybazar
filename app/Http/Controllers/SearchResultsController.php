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
use ONGR\ElasticsearchDSL\Aggregation\Bucketing\RangeAggregation;
use ONGR\ElasticsearchDSL\Aggregation\Bucketing\TermsAggregation;
use ONGR\ElasticsearchDSL\Aggregation\Metric\MaxAggregation;
use ONGR\ElasticsearchDSL\Aggregation\Metric\MinAggregation;


class SearchResultsController extends Controller
{
    public function searchResults(Request $request)
    {
        if (!empty($value = $request->get('search'))) {

            $request->session()->flash('search', $request->get('search'));

            $categoryId = $request->get('category_id');

            $length = 10;
            if ($categoryId) {
                $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)
                    ->where('category_id', $categoryId)->paginate(10);
            } else {
                $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)->paginate(10);

            }

//            if ($categoryId) {
//                $brands = Brand::search($value)->where('categories', $categoryId)->paginate($length);
//            } else {
//                $brands = Brand::search($value)->paginate($length);
//            }
//
//            if ($categoryId) {
//                $stores = Store::search($value)->where('status', Store::STATUS_ACTIVE)
//                    ->where('categories', $categoryId)->paginate($length);
//            } else {
//                $stores = Store::search($value)->where('status', Store::STATUS_ACTIVE)->paginate($length);
//            }

        }

        $ratings = [];
        $categories = [];
        $min_price = 0;
        $max_price = 1;
        $brandFilter = [];

        foreach ($products as $i => $product) {
            $ratings[$i] = [
                'id' => $product->id,
                'rating' => $product->rating,
            ];
            $categories[$i] = [
                'id' => $product->mainCategory->id,
                'name' => $product->mainCategory->name,
            ];
            $brandFilter[$i] = [
                'id' => $product->id,
                'name' => $product->name
            ];


            if ($min_price === 0) {
                $min_price = $product->price_uzs;
            } elseif ($min_price > $product->price_uzs) {
                $min_price = $product->price_uzs;
            } elseif ($max_price < $product->price_uzs) {
                $max_price = $product->price_uzs;
            }
        }
//        dd($products);
//        foreach ($products as $i => $category){
//            dd($category);
//        }
        return view('search.search-results', compact('stores', 'brands', 'products', 'ratings',
            'categories', 'max_price', 'min_price', 'brandFilter'));
    }

    public function SearchFilter(Request $request)
    {
        $value = $request->get('search');
        $brandSearch = $request->get('brands');
        $max_priceSearch = $request->get('max_price');
        $min_priceSearch = $request->get('min_price');
        $request->session()->flash('search', $request->get('search'));

        $categoryId = $request->get('category_id');

        $length = 10;
        if ($categoryId) {
            $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)
                ->where('category_id', $categoryId)->paginate(10);
        } elseif ($brandSearch) {
            $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)
                ->where('brand_id', $brandSearch)->paginate(10);
        } elseif ($brandSearch and $categoryId) {
            $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)
                ->where('category_id', $categoryId)->where('brand_id', $brandSearch)->paginate(10);
        } else {
            $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)->paginate();
            $product_id = [];
            if ($max_priceSearch || $min_priceSearch) {
                foreach ($products as $i => $product) {
                    $product_id[$i] = [
                        $product->id,
                    ];
                }
                $products = Product::wherein('id', $product_id)
                    ->where('price_uzs', '>=', $min_priceSearch)
                    ->where('price_uzs', '<=', $max_priceSearch)->paginate(10);
            }
        }
        $ratings = [];
        $categories = [];
        $min_price = 0;
        $max_price = 1;

        foreach ($products as $i => $product) {
            $ratings[$i] = [
                'id' => $product->id,
                'rating' => $product->rating,
            ];
            $categories[$i] = [
                'id' => $product->mainCategory->id,
                'name' => $product->mainCategory->name,
            ];
            $brandFilter[$i] = [
                'id' => $product->id,
                'name' => $product->name
            ];

        }
        $min_price = $min_priceSearch;
        $max_price = $max_priceSearch;

        return view('search.search-results', compact('products', 'ratings', 'categories', 'max_price', 'min_price', 'brandFilter'));

    }

}
