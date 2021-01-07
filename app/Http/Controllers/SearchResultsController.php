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

            $categoryId = $request->get('category_id');
            $length = 10;
            $getCategories = Category::where('id', $categoryId)->first();
            $getCategories = $getCategories->children()->get();
            $productCategoryIds = [];
            foreach ($getCategories as $i => $category){
                $productCategoryIds[$i] = $category->id;
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

            $brands = Brand::orderBy('name_en', 'asc');
            if ($value = $request->get('brand') == null) {
                $brands->get();
            }

            if (!empty($value = $request->get('brand-latin'))) {
                $brands->where(function ($query) use ($value) {
                    $query->where('name_en', 'LIKE', $value . '%')
                        ->orWhere('name_uz', 'LIKE',$value . '%');
                });
            }

            if (!empty($value = $request->get('brand-cyrill'))) {
                $brands->where(function ($query) use ($value) {
                    $query->where('name_ru', 'LIKE', $value . '%');
                });
            }

            $groupsEn = $brands->get()->reduce(function ($carry, $brand) {

                $first_letter = $brand['name_en'][0];

                if (!isset($carry[$first_letter])) {
                    $carry[$first_letter] = [];
                }

                $carry[$first_letter][] = $brand;

                return $carry;
            }, []);

            $groupsRu = $brands->get()->reduce(function ($carry, $brand) {

                $first_letter = substr($brand['name_ru'],0,2);

                if (!isset($carry[$first_letter])) {
                    $carry[$first_letter] = [];
                }

                $carry[$first_letter][] = $brand;

                return $carry;
            }, []);


            $newProducts = Product::limit(12)->where(['new' => true])->get();
            return view('search.search-results', compact('stores', 'brands', 'products', 'ratings',
                'categories', 'max_price', 'min_price', 'brandFilter', 'blogs', 'blogsCategory', 'videosCategory',
                'videos', 'storesCategory', 'stores', 'newProducts', 'brandsCategory', 'groupsEn', 'groupsRu' ));
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
