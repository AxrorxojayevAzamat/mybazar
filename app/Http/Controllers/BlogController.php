<?php

namespace App\Http\Controllers;

use App\Entity\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\Product;
use App\Helpers\LanguageHelper;
use App\Helpers\ProductHelper;
use App\Models\Post;
use App\Models\Videos;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $blogs = Post::orderByDesc('created_at')->where(['is_published' => true])->paginate(20);
        $categories = \App\Models\Category::get();
//        dd($blogs);
        return view('pages.blog',compact('blogs','categories'));
    }

    public function show(Post $blog){
        $post = $blog->load(['category']);
        $categories = \App\Models\Category::get();
        $lastBlogs = Post::orderByDesc('created_at')->where(['is_published' => true])->limit(3)->get();

        return view('pages.bloginner', compact('post', 'categories','lastBlogs'));
    }
}
