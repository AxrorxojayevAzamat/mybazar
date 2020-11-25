<?php

namespace App\Http\Controllers;

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
            $selector = $query->where('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'ilike', '%' .$request->get('shopName'). '%');
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

    public function view($id, Request $request)
    {
        $store = Store::findOrFail($id);
        $product = Product::where(['store_id' => $id])->where(['status' => Product::STATUS_ACTIVE])->paginate(20);
        return view('stores.view', compact('store', 'product'));
    }
}
