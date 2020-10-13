<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Blog\News;

class NewsController extends Controller
{

    public function show(News $news)
    {
        $news = $news->load(['category']);
        $categories = Category::orderByDesc('created_at')->get();

        return view("blog.news-inner", compact('news', 'categories'));
    }

}
