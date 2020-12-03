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
        $query = Product::orderByDesc('created_at');


        $posts = Post::published()->orderByDesc('updated_by')->get();
        $banners = Banner::where('type', Banner::TYPE_LONG)->published()->orderByDesc('updated_by')->get();
        $banner = $banners->isNotEmpty() ? $banners->random() : null;
        $brands = Brand::orderByDesc('created_at')->limit(24)->get();
        $shops2 = $query->where(['status' => Product::STATUS_ACTIVE])->inRandomOrder()->limit(1)->get();
        $shops2ThreeItems = $query->where(['status' => Product::STATUS_ACTIVE])->limit(10)->get();
        $newProducts = $query->limit(12)->where(['new' => true])->get();


        return view('catalog.catalog-section', compact('categories', 'posts', 'brands', 'banner', 'shops2', 'shops2ThreeItems','newProducts'));

    }

    public function show(Request $request, ProductsPath $path)
    {
        $category = $path->category;
        if ($category->children->isEmpty()) {
            return $this->childCategoryShow($request, $category);
        }

        return $this->parentCategoryShow($request, $category);
    }

    private function parentCategoryShow(Request $request, Category $category)
    {
        $categories = $category->children()->get()->toTree();
        $query = Product::where('main_category_id', $category->id)->orderByDesc('created_at');

        $posts = Post::where('category_id', $category->id)->published()->orderByDesc('updated_by')->get();
        $banners = Banner::where('category_id', $category->id)->where('type', Banner::TYPE_LONG)->published()->orderByDesc('updated_by')->get();
        $banner = $banners->isNotEmpty() ? $banners->random() : null;
        $brands = Brand::orderByDesc('created_at')->limit(24)->get();
        $shops2 = $query->where(['status' => Product::STATUS_ACTIVE])->inRandomOrder()->limit(1)->get();
        $shops2ThreeItems = $query->where(['status' => Product::STATUS_ACTIVE])->limit(10)->get();
        $newProducts = $query->limit(12)->where(['new' => true])->get();


        return view('catalog.catalog-section', compact('categories', 'posts', 'brands', 'banner', 'shops2', 'shops2ThreeItems','newProducts'));

    }

    private function childCategoryShow(Request $request, Category $category)
    {

        $categoryId = array_merge($category->descendants()->pluck('id')->toArray(), [$category->id]);
        if (isset($request->order)){
            if (session()->has('order_catalog') and session('order_catalog') == 'desc'){
                $products = Product::whereIn('main_category_id', $categoryId)->orderBy($request->order, 'asc')->get();
                session(['order_catalog' => 'asc']);
            }else{
                $products = Product::whereIn('main_category_id', $categoryId)->orderBy($request->order, 'DESC')->get();
                session(['order_catalog' => 'desc']);
            }
        }else{
            $products = Product::whereIn('main_category_id', $categoryId)->get();

        }

        $min_price = 0;
        $max_price = 1;
        $ratings = [];
        $products_id = [];

        foreach ($products as $i => $product){
            if ($min_price === 0) {
                $min_price = $product->price_uzs;
            } elseif ($min_price > $product->price_uzs) {
                $min_price = $product->price_uzs;
            } elseif ($max_price < $product->price_uzs) {
                $max_price = $product->price_uzs;
            }
            $ratings[$i] = [
                'id' => $product->id,
                'rating' => $product->rating,
            ];

            $products_id[$i] = $product->id;

        }

        $brandIds = $products->pluck('brand_id')->toArray();
        $brands = Brand::whereIn('id', $brandIds)->get();

        $storeIds = $products->pluck('store_id')->toArray();
        $stores = Store::whereIn('id', $storeIds)->get();


//        $groupModifications = $this->filterService->groupModificationByCategoryId($categoryIds);





        return view('catalog.catalog', compact('category', 'products', 'brands', 'stores', 'groupModifications', 'min_price', 'max_price', 'ratings'));
    }

}
