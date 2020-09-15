<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class VideoBlogViewController extends Controller
{
    public function videoBlogView() {
        return view('videoblog.videoblog-view'); 
    }
}
