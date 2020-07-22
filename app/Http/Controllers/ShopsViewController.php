<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class ShopsViewController extends Controller
{
    public function shopsView() {
       
        return view('pages.shops-view'); 
    }
}
