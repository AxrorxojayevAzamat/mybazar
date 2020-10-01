<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;
use App\Models\Post;

class BlogsNewsController extends Controller
{
    public function blogsNews() {
        $blogs = Post::orderByDesc('created_at')->where(['is_published' => true])->paginate(20);
        return view('pages.blogs-news', compact('blogs','categories')); 
    }
}
