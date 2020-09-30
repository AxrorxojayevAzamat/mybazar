<?php

namespace App\Http\Controllers;

class FavoritesController extends Controller
{

    public function favorites()
    {
        return view('favorite.favorites');
    }

}
