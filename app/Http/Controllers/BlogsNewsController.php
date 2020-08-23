<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class BlogsNewsController extends Controller
{
    public function blogsNews() {
        return view('pages.blogs-news'); 
    }
}
