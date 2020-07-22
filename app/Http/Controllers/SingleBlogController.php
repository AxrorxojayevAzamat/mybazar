<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;

class SingleBlogController extends Controller
{
    public function singleBlog() {
        return view('pages.single-blog'); 
    }
}
