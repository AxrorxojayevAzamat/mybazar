<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class BrandViewController extends Controller
{
    public function brandView() {
        return view('pages.brand-view'); 
    }
}
