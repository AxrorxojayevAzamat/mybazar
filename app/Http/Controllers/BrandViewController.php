<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;
use App\Entity\Brand;

class BrandViewController extends Controller
{
    public function brandView(Brand $brand) {
        $query = Product::orderByDesc('created_at')->where('brand_id',$brand->id);
        $product = $query->paginate(12); //paginate() {{$products->links()}} render qlish uchun kere.
        $products = $query->paginate(12); // boshqa payt, get() ni ishlatsayam boladi
        return view('brand.brand-view',compact('product','products')); 
    }
}
