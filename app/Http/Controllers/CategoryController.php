<?php

namespace App\Http\Controllers;

use App\Entity\Banner;
use App\Entity\Blog\Post;
use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Shop\CategoryBrand;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Entity\StoreCategory;
use App\Http\Router\ProductsPath;
use Illuminate\Http\Request;
use App\Services\Manage\FilterService;

class CategoryController extends Controller
{

    private $filterService;

    public function __construct(FilterService $filterService)
    {
//        $this->middleware('auth');
        $this->filterService = $filterService;
    }

    public function index()
    {
        $category = Category::where(['parent_id' => null])->get();
        $categories = $category;
//        dd($category);

        $brands = Brand::all();
        $stores = Store::all();


        return view('catalog.catalog-section', compact('category', 'brands', 'stores', 'categories'));
    }

    public function show(Request $request, ProductsPath $path)
    {
//        dd($path);
        $category = $path->category;
        if ($category->children->isEmpty()) {
            return $this->childCategoryShow($request, $category);
        }

        return $this->parentCategoryShow($request, $category);
    }

    private function parentCategoryShow(Request $request, Category $category)
    {
        $categories = $category->children()->get()->toTree();


        $posts = Post::where('category_id', $category->id)->published()->orderByDesc('updated_by')->get();

//        $banners = Banner::where('category_id', $category->id)->published()->orderByDesc('updated_by')->get();
        $banner = $banners->isNotEmpty() ? $banners->random() : null;
//        unset($banners);

//        $brands = Brand::all();
//        $stores = Store::all();


        return view('catalog.catalog-section', compact('categories', 'posts'));

    }

    private function childCategoryShow(Request $request, Category $category)
    {
        $categoryId = array_merge($category->descendants()->pluck('id')->toArray(), [$category->id]);


        $brandIds = CategoryBrand::whereIn('category_id', $categoryId)->pluck('brand_id')->toArray();
        $brands = Brand::whereIn('id', $brandIds)->get();

        $storeIds = StoreCategory::whereIn('category_id', $categoryId)->pluck('store_id')->toArray();
        $stores = Store::whereIn('categories', $storeIds)->get();


//        $groupModifications = $this->filterService->groupModificationByCategoryId($categoryIds);

        $products = Product::whereIn('main_category_id', $categoryId)->get();

        $min_price = 0;
        $max_price = 1;
        foreach ($products as $i => $product){
            if ($min_price === 0) {
                $min_price = $product->price_uzs;
            } elseif ($min_price > $product->price_uzs) {
                $min_price = $product->price_uzs;
            } elseif ($max_price < $product->price_uzs) {
                $max_price = $product->price_uzs;
            }
        }
        $ratings = [];
        foreach($products as $i => $product) {
            $ratings[$i] = [
                'id' => $product->id,
                'rating' => $product->rating,
            ];
        }

        return view('catalog.catalog', compact('category', 'products', 'brands', 'stores', 'groupModifications', 'min_price', 'max_price', 'ratings'));
    }

}
