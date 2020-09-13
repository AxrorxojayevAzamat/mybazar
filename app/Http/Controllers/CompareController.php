<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class CompareController extends Controller
{
    public function compare() {
        return view('pages.compare.compare'); 
    }
}
