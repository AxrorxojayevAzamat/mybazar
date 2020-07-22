<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class SalesViewController extends Controller
{
    public function salesView() {
        return view('pages.sales-view'); 
    }
}
