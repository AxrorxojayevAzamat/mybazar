<?php

namespace App\Http\Controllers;

use App\Entity\Blog\Post;
use App\Entity\Category;
use App\Entity\Shop\Product;

class BlogController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function blogsNews()
    {
        $blogs = Post::published()->orderByDesc('created_at')->paginate(20);
        $categories = Category::get();

        return view('blog.blogs-news', compact('blogs', 'categories'));
    }

    public function show(Post $blog)
    {
        $post = $blog->load(['category']);
        $categories = Category::get();
        $lastBlogs = Post::published()->orderByDesc('created_at')->where('id', '!=', $post->id)->limit(20)->get()->random(3);
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();

        return view('blog.blog-show', compact('post', 'categories', 'lastBlogs', 'recentProducts'));
    }

}
