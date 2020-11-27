<?php

namespace App\Http\Controllers;

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
    public function index(Request $request, $order = null)
    {
        $query = Store::where(['status' => Store::STATUS_ACTIVE]);
        if (!empty($request->get('shopName'))) {
            $selector = $query->where('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'ilike', '%' . $request->get('shopName') . '%');
            $stores = $selector->paginate(12);
        }
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();
        $stores = $query->paginate(12);
        $categories = Category::where('parent_id', null)->get();
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

    public function view(Request $request, Store $store)
    {
        $query = Product::where(['status' => Product::STATUS_ACTIVE])->where(['store_id' => $store->id]);
//        dd($request->get('order'));
        if (!empty($value = $request->get('brands'))) {
            $value = explode(',', $value);
            $brandIds = Brand::whereIn('slug', $value)->pluck('id')->toArray();
            $query->whereIn('brand_id', $brandIds);
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

        $brands = Brand::all();

        $products = $query->paginate(20);
        $ratings = [];
        foreach ($products as $i => $product) {
            $ratings[$i] = [
                'id' => $product->id,
                'rating' => $product->rating,
            ];
        }
        $dayProducts = Product::where(['bestseller' => true, 'status' => Product::STATUS_ACTIVE])
            ->where('discount', '>', 0)->where('discount_ends_at', '>', date('Y-m-d H:i:s'))
            ->orderByDesc('discount')->limit(9)->get();

        return view('stores.view', compact('products', 'brands', 'ratings', 'dayProducts', 'store'));

    }
}
