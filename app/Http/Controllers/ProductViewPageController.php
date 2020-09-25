<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class ProductViewPageController extends Controller
{
    public function productViewPage(Product $product) {
        return view('products.show', compact('product'));
    }
}
