<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class SalesController extends Controller
{
    public function sales() {
        return view('pages.sales'); 
    }
}
