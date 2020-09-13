<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;
use App\Models\Post;
use App\Models\News;

class BlogsNewsController extends Controller
{
    public function blogsNews() {
        $blogs = Post::orderByDesc('created_at')->where(['is_published' => true])->paginate(20);
        $categories = \App\Models\Category::get();
        $news = News::orderByDesc('created_at')->where(['is_published' => true])->with(['category'])->paginate(20);

        return view('pages.blog.blogs-news',compact('blogs','categories','news'));
    }
}
