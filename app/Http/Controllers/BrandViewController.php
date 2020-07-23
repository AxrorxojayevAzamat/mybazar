<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class BrandViewController extends Controller
{
    public function brandView() {
        $query = Product::orderByDesc('created_at');
        $product = $query->paginate(12); //paginate() {{$products->links()}} render qlish uchun kere.
        $products = $query->paginate(12); // boshqa payt, get() ni ishlatsayam boladi
        return view('pages.brand-view',compact('product','products')); 
    }
}
