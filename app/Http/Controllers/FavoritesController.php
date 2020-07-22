<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class FavoritesController extends Controller
{
    public function favorites() {
        return view('pages.favorites'); 
    }
}
