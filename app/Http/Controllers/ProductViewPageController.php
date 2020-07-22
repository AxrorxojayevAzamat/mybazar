<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class ProductViewPageController extends Controller
{
    public function productViewPage() {
        return view('pages.productviewpage'); 
    }
}
