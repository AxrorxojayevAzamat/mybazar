<?php

namespace App\Http\Controllers;

use App\Entity\Shop\Category;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductCategory;

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
        return view('catalog.catalog-section',compact('rootCategories'));
    }

    public function show(Category $category)
    {
        $query = Product::orderByDesc('updated_at')->where(['status' => Product::STATUS_ACTIVE]);
        $products = ProductCategory::where(['category_id' => $category->id])->pluck('product_id')->toArray();
        $query->whereIn('id', $products);
        $products = $query->paginate(20);
//        dd($products);
        return view('catalog.catalog', compact('products'));
    }
}
