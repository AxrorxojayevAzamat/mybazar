<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class PayController extends Controller
{
    public function pay() {
        return view('cart.pay'); 
    }
}
