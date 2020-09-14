<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\News;

class BlogController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function blogsNews()
    {
        $blogs = Post::orderByDesc('created_at')->where(['is_published' => true])->paginate(20);
        $categories = \App\Models\Category::get();
        $news = News::orderByDesc('created_at')->where(['is_published' => true])->with(['category'])->paginate(20);

        return view('blog.blogs-news', compact('blogs', 'categories', 'news'));
    }

    public function show(Post $blog)
    {
        $post = $blog->load(['category']);
        $categories = \App\Models\Category::get();
        $lastBlogs = Post::orderByDesc('created_at')->where(['is_published' => true])->limit(3)->get();

        return view('blog.blog-show', compact('post', 'categories', 'lastBlogs'));
    }

}
