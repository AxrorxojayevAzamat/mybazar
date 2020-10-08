<?php

namespace App\Http\Controllers;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Store;
use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class ShopsController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::orderByDesc('created_at');

        if (!empty($value = $request->get('categories'))) {
            $value = explode(',', $value);
            $categories = Category::whereIn('slug', $value)->get();
            $categoryIds = $categories->pluck('id')->toArray();

            foreach ($categories as $category) {
                $categoryIds = array_merge($categoryIds, $category->descendants()->pluck('id')->toArray());
            }

            $query->whereIn('main_category_id', $categoryIds);
        }

        $products = $query->paginate(12);

        $categories = Category::where('parent_id', null)->get();

        return view('shop.shops', compact('products', 'categories'));
    }

    public function view(Request $request, Store $store)
    {
        $query = Product::where(['status' => Product::STATUS_ACTIVE])->where('store_id', $store->id);

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

        if (empty($price) && empty($rating) && empty($newItems)) {
            $query->orderByDesc('updated_at');
        }

        if (!empty($price)) {
            $query->orderBy('price_uzs');
        }

        if (!empty($rating)) {
            $query->orderByDesc('rating');
        }

        if (!empty($newItems)) {
            $query->orderByDesc('new');
        }

        $brands = Brand::all();

        $products = $query->paginate(20);

        return view('shop.shops-view', compact('products', 'brands'));
    }
}
