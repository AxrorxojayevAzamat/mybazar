<?php

namespace App\Http\Controllers;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Shop\CategoryBrand;
use App\Entity\Store;
use App\Entity\StoreCategory;
use App\Helpers\PaginateHelper;
use App\Http\Resources\BrandResource;
use App\Http\Resources\Shop\ProductResource;
use App\Http\Resources\StoreResource;
use Illuminate\Http\Request;
use App\Entity\Shop\Product;
use App\Entity\Blog\Post;

//use App\Models\Post;
use App\Models\Videos;
use App\Entity\Blog\Video;
use App\Models\VideosCategory;
use ONGR\ElasticsearchDSL\Aggregation\Bucketing\RangeAggregation;
use ONGR\ElasticsearchDSL\Aggregation\Bucketing\TermsAggregation;
use ONGR\ElasticsearchDSL\Aggregation\Metric\MaxAggregation;
use ONGR\ElasticsearchDSL\Aggregation\Metric\MinAggregation;


class SearchResultsController extends Controller
{
    public function searchResults(Request $request)
    {
        $ratings = [];
        $min_price = 0;
        $max_price = 1;
        $brandFilter = [];

        if (!empty($value = $request->get('search'))) {
            $request->session()->flash('search', $request->get('search'));
            $length = 10;
            $categoryId = $request->get('category_id');
            if ($categoryId && $categoryId !== 'all') {
                $getCategories = Category::where('id', $categoryId)->first();
                $getCategories = $getCategories->children()->get();
                $productCategoryIds = [];
                foreach ($getCategories as $i => $category) {
                    $productCategoryIds[$i] = $category->id;
                }
            }

            if ($categoryId && $categoryId !== 'all') {
                $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)
                    ->get();
                $products = $products->whereIn('main_category_id', $productCategoryIds);
                $products = PaginateHelper::paginate($products, 9);
            } else {
                $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)->paginate(10);

            }

            foreach ($products as $i => $product) {
                $ratings[$i] = [
                    'id' => $product->id,
                    'rating' => $product->rating,
                ];

                if ($min_price === 0) {
                    $min_price = $product->price_uzs;
                } elseif ($min_price > $product->price_uzs) {
                    $min_price = $product->price_uzs;
                } elseif ($max_price < $product->price_uzs) {
                    $max_price = $product->price_uzs;
                }
            }
            $blogs = Post::search($value)->where('status', Post::PUBLISHED)->paginate(10);
            $videos = Video::search($value)->where('status', Video::PUBLISHED)->paginate(10);

            $videoIds = $videos->pluck('category_id')->toArray();
            $videosCategory = Category::whereIn('id', $videoIds)->get();

            $stores = Store::search($value)->where('status', Store::STATUS_ACTIVE)->paginate(10);
            $storeIds = $stores->pluck('id')->toArray();
            $storesCategoryIds = StoreCategory::whereIn('store_id', $storeIds)->pluck('category_id')->toArray();

            $storesCategory = Category::whereIn('id', $storesCategoryIds)->get();

            $blogIds = $blogs->pluck('category_id')->toArray();
            $blogsCategory = Category::whereIn('id', $blogIds)->get();

            $categoryIds = $products->pluck('main_category_id')->toArray();
            $categories = Category::whereIn('id', $categoryIds)->get();
            $brandIds = $products->pluck('brand_id')->toArray();
            $brandFilter = Brand::whereIn('id', $brandIds)->get();
            $brandCategoryIds = $brandFilter->pluck('id')->toArray();
            $brandsCategoriesId = CategoryBrand::whereIn('brand_id', $brandCategoryIds)->pluck('category_id')->toArray();

            $brandsCategory = Category::whereIn('id', $brandsCategoriesId)->get();

            $newProducts = Product::limit(12)->where(['new' => true])->get();
            return view('search.search-results', compact('stores', 'brands', 'products', 'ratings',
                'categories', 'max_price', 'min_price', 'brandFilter', 'blogs', 'blogsCategory', 'videosCategory',
                'videos', 'storesCategory', 'stores', 'newProducts', 'brandsCategory', 'groupsEn', 'groupsRu'));
        } elseif (!empty($categoryId = $request->get('category_id')) && empty($request->get('search')) && $request->get('category_id') !== 'all') {
            $ratings = [];
            $min_price = 0;
            $max_price = 1;
            $brandFilter = [];
            $getCategories = Category::where('id', $categoryId)->first();
            $getCategories = $getCategories->children()->get();

            $productCategoryIds = [];
            foreach ($getCategories as $i => $category) {
                $productCategoryIds[$i] = $category->id;
            }

            $products = Product::whereIn('main_category_id', $productCategoryIds)->paginate(9);
//            $products = PaginateHelper::paginate($products, 9);

            foreach ($products as $i => $product) {
                $ratings[$i] = [
                    'id' => $product->id,
                    'rating' => $product->rating,
                ];

                if ($min_price === 0) {
                    $min_price = $product->price_uzs;
                } elseif ($min_price > $product->price_uzs) {
                    $min_price = $product->price_uzs;
                } elseif ($max_price < $product->price_uzs) {
                    $max_price = $product->price_uzs;
                }
            }
            $blogs = Post::published()->whereIn('category_id', $productCategoryIds)->paginate(20);
            $blogIds = $blogs->pluck('category_id')->toArray();
            $blogsCategory = Category::whereIn('id', $blogIds)->get();

            $videos = Video::whereIn('category_id', $productCategoryIds)->get();
            $videoIds = $videos->pluck('category_id')->toArray();
            $videosCategory = Category::whereIn('id', $videoIds)->get();


            $storesList = StoreCategory::whereIn('category_id', $productCategoryIds)->pluck('store_id')->toArray();
            $selector = Store::whereIn('id', $storesList);
            $stores = $selector->paginate(12);
            $storesCategory = Category::whereIn('id', $productCategoryIds)->get();
            $categories = Category::whereIn('id', $productCategoryIds)->get();

            $brandIds = $products->pluck('brand_id')->toArray();
            $brandFilter = Brand::whereIn('id', $brandIds)->get();
            $brandCategoryIds = $brandFilter->pluck('id')->toArray();
            $brandsCategoriesId = CategoryBrand::whereIn('brand_id', $brandCategoryIds)->pluck('category_id')->toArray();

            $brandsCategory = Category::whereIn('id', $brandsCategoriesId)->get();

            return view('search.search-results', compact('stores', 'brands', 'products', 'ratings',
                'categories', 'max_price', 'min_price', 'brandFilter', 'blogs', 'blogsCategory', 'videosCategory',
                'videos', 'storesCategory', 'stores', 'newProducts', 'brandsCategory', 'groupsEn', 'groupsRu'));

        }else{
            $min_price = 0;
            $max_price = 0;

            return view('search.search-results', compact('max_price', 'min_price'));
        }

    }

    public function SearchFilter(Request $request)
    {
        $value = $request->get('search');
        $brandSearch = $request->get('brands');
        $max_priceSearch = $request->get('max_price');
        $min_priceSearch = $request->get('min_price');
        $request->session()->flash('search', $request->get('search'));
        $videos = Video::search($value)->where('status', Video::PUBLISHED)->paginate(10);

        $videoIds = $videos->pluck('category_id')->toArray();
        $videosCategory = Category::whereIn('id', $videoIds)->get();
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
            $products = Product::search($value)->where('status', Product::STATUS_ACTIVE)->paginate(10);
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
        $blogs = Post::search($value)->where('status', Post::PUBLISHED)->paginate(10);


        $ratings = [];
        $categories = [];
        $min_price = 0;
        $max_price = 1;

        foreach ($products as $i => $product) {
            $ratings[$i] = [
                'id' => $product->id,
                'rating' => $product->rating,
            ];
//            $categories[$i] = [
//                'id' => $product->mainCategory->id,
//                'name' => $product->mainCategory->name,
//            ];
//            $brandFilter[$i] = [
//                'id' => $product->id,
//                'name' => $product->name
//            ];

        }
        $min_price = $min_priceSearch;
        $max_price = $max_priceSearch;
        $categoryIds = $products->pluck('main_category_id')->toArray();
        $categories = Category::whereIn('id', $categoryIds)->get();
        $stores = Store::search($value)->where('status', Store::STATUS_ACTIVE)->paginate(10);
        $storeIds = $stores->pluck('id')->toArray();
        $storesCategoryIds = StoreCategory::whereIn('store_id', $storeIds)->pluck('category_id')->toArray();
        $blogIds = $blogs->pluck('category_id')->toArray();
        $blogsCategory = Category::whereIn('id', $blogIds)->get();
        $storesCategory = Category::whereIn('id', $storesCategoryIds)->get();
        $brandIds = $products->pluck('brand_id')->toArray();
        $brandFilter = Brand::whereIn('id', $brandIds)->get();
        $brandCategoryIds = $brandFilter->pluck('id')->toArray();
        $brandsCategoriesId = CategoryBrand::whereIn('brand_id', $brandCategoryIds)->pluck('category_id')->toArray();

        $brandsCategory = Category::whereIn('id', $brandsCategoriesId)->get();
        return view('search.search-results', compact('products', 'blogsCategory', 'videos', 'storesCategory', 'blogs', 'ratings', 'brandsCategory', 'categories', 'max_price', 'min_price', 'brandFilter', 'stores', 'videosCategory'));

    }

}
