<?php

namespace App\Http\Controllers;

use App\Entity\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\CategoryBrand;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductCategory;
use App\Entity\Store;
use App\Entity\StoreCategory;
use App\Http\Router\ProductsPath;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $rootCategories = Category::where(['parent_id' => null])->get();
//        dd($categories);
        return view('catalog.catalog-section', compact('rootCategories'));
    }

    public function show(Request $request, ProductsPath $path)
    {
        $category = $path->category;
        $categoryIds = array_merge($category->descendants()->pluck('id')->toArray(), [$category->id]);
        $brandIds = CategoryBrand::whereIn('category_id', $categoryIds)->pluck('brand_id')->toArray();
        $storeIds = StoreCategory::whereIn('category_id', $categoryIds)->pluck('store_id')->toArray();

        $brands = Brand::whereIn('id', $brandIds)->get();
        $stores = Store::whereIn('id', $storeIds)->get();

        $query = Product::orderByDesc('updated_at')
            ->where(['status' => Product::STATUS_ACTIVE])
            ->whereIn('main_category_id', $categoryIds);
//        $products = ProductCategory::whereIn('category_id', $categoryIds)->pluck('product_id')->toArray();
//        $query->whereIn('id', $products);

        $products = $query->paginate(20);

        return view('catalog.catalog', compact('category', 'products', 'brands', 'stores'));
    }
}
