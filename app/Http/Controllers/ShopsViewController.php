<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class ShopsViewController extends Controller
{
    public function shopsView() {
        $query = Product::orderByDesc('created_at');
        $product = $query->paginate(12); //paginate() {{$products->links()}} render qlish uchun kere.
        $products = $query->paginate(12); // boshqa payt, get() ni ishlatsayam boladi
        return view('pages.shops-view',compact('product','products')); //compact ichidigi peremenniyla , view digi blade ga beriladi.
    }
}
