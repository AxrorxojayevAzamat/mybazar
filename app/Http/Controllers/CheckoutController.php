<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class CheckoutController extends Controller
{
    public function checkout() {
        return view('pages.checkout'); 
    }
}
