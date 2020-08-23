<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class BrandsController extends Controller
{
    public function brands() {
        return view('pages.brands'); 
    }
}
