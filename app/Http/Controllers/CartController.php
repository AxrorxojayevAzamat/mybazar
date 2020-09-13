<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class CartController extends Controller
{
    public function cart() {
        return view("pages.cart.cart"); 
    }
}
