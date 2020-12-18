<?php

namespace App\Http\Controllers;

use App\Entity\Blog\Post;
use App\Entity\Category;
use App\Entity\Shop\Product;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function blogs(Request $request)
    {
        $blogs = Post::published()->orderByDesc('created_at')->paginate(20);
//        $categories = \App\Entity\Category::get();
//        $news = News::orderByDesc('created_at')->where(['is_published' => true])->with(['category'])->paginate(20);
        if (isset($request->blogName)){
            $value = $request->blogName;
            $blogs = Post::search($value)->where('status', Post::PUBLISHED)->paginate(10);
        }
        $blogsCategoryId = $blogs->pluck('category_id')->toArray();

        $categories = Category::whereIn('id', $blogsCategoryId)->orderByDesc('created_at')->get();
//        dd($request->shopName);

        if (isset($request->categoryName)){
            $blogs = Post::published()->where('category_id', $request->get('categoryName'))->paginate(20);

        }
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();
        return view('blog.blogs', compact('blogs', 'categories', 'recentProducts', 'parentCategory', 'rootCategoryShow'));
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
