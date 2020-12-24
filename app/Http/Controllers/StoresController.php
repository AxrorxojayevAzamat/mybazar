<?php

namespace App\Http\Controllers;

use App\Entity\Banner;
use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Entity\StoreCategory;
use App\Helpers\LanguageHelper;
use DB;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function index(Request $request)
    {
        $query = Store::where(['status' => Store::STATUS_ACTIVE]);
        if (!empty($request->get('shopName'))) {
            $selector = $query->where('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'ilike', '%' . $request->get('shopName') . '%');
            $stores = $selector->paginate(12);
        }
        if (!empty($request->get('name'))) {
            $selector = $query->orderBy('name_' . LanguageHelper::getCurrentLanguagePrefix());
            $stores = $selector->paginate(12);
        }
        if (!empty($request->get('category_id'))) {
            $storesList = StoreCategory::where(['category_id' => $request->get('category_id')])->pluck('store_id');
            $selector = $query->whereIn('id',$storesList);
            $stores = $selector->paginate(12);
        }
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();
        $stores = $query->paginate(12);
        $categories = Category::where('parent_id', null)->get();
        $longBanner = Banner::published()->where('type', Banner::TYPE_LONG)->inRandomOrder()->first();

        return view('stores.index', compact('stores', 'categories', 'recentProducts'));
    }

    public function store($id)
    {
        $arrayStores = StoreCategory::where(['category_id' => $id])->pluck('store_id');
        $query = Store::where(['status' => Store::STATUS_ACTIVE]);
        $stores = $query->whereIn('id', $arrayStores)->get();
        $categories = Category::where('parent_id', null)->get();
        return view('stores.index', compact('stores', 'categories'));
    }

    public function view(Request $request, Store $store, Category $category)
    {
        $query = Product::where(['status' => Product::STATUS_ACTIVE])->where(['store_id' => $store->id]);

        if ($request->categoryName and $request->categoryName !== 'all'){
            $query = $query->where('main_category_id', $request->categoryName);
        }

        if (!empty($value = $request->get('brands'))) {
            $query->whereIn('brand_id', $value);
        }
        if (!empty($value = $request->get('min_price'))) {
            $query->where('price_uzs', '>=', $value);
        }

        if (!empty($value = $request->get('max_price'))) {
            $query->where('price_uzs', '<=', $value);
        }

        if (empty($request->get('order'))) {
            $query->orderByDesc('updated_at');

        }

        if (!empty($request->get('order')) && $request->get('order') == 'price') {
            $query->orderByDesc('price_uzs');
        }

        if (!empty($request->get('order')) && $request->get('order') == 'rating') {
            $query->orderByDesc('rating');
        }

        if (!empty($request->get('order')) && $request->get('order') == 'new') {
            $query->orderByDesc('new');
        }

        $brandsId = $query->pluck('brand_id')->toArray();
//        dd($brandsId);
        $brands = Brand::whereIn('id', $brandsId)->get();
        $newProductIds = $query->pluck('main_category_id')->toArray();


        $products = $query->paginate(10);
        $ratings = [];
        $min_price = 0;
        $max_price = 1;
        foreach ($products as $i => $product) {
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
        }
        $dayProducts = Product::where(['bestseller' => true, 'status' => Product::STATUS_ACTIVE])
            ->where('discount', '>', 0)->where('discount_ends_at', '>', date('Y-m-d H:i:s'))
            ->orderByDesc('discount')->limit(9)->get();
        $categories = Category::whereIn('id', $newProductIds)->get();

        $rootCategoryShow = true;
        $parentCategory = $category->parent()->get()->toTree();

        return view('stores.view', compact('products', 'brands', 'ratings', 'dayProducts', 'store','categories', 'parentCategory', 'min_price', 'max_price', 'parentCategory', 'rootCategoryShow'));

    }
}
