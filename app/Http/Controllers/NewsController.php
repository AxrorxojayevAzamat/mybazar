<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{

    public function show(News $news)
    {
        $news = $news->load(['category']);
        $categories = NewsCategory::get();

        return view("blog.news-inner", compact('news', 'categories'));
    }

}
