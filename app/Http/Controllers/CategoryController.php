<?php

namespace App\Http\Controllers;

use App\Entity\Shop\Category;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductCategory;
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
        $query = Product::orderByDesc('updated_at')->where(['status' => Product::STATUS_ACTIVE]);
        $products = ProductCategory::whereIn('category_id', $categoryIds)->pluck('product_id')->toArray();
        $query->whereIn('id', $products);
        $products = $query->paginate(20);
//        dd($products);
        return view('catalog.catalog', compact('products'));
    }
}
