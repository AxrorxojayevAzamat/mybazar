<?php

namespace App\Http\Controllers;

use App\Entity\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\Product;
use App\Helpers\LanguageHelper;
use App\Helpers\ProductHelper;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Post;
use App\Models\Videos;
use App\Models\VideosCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $news = News::orderByDesc('created_at')->where(['is_published' => true])->with(['category'])->paginate(20);
        $categories = NewsCategory::get();
        return view("pages.news",compact('news','categories'));
    }

    public function show(News $news){
        $news = $news->load(['category']);
        $categories = NewsCategory::get();
//        dd($news);

        return view("pages.news-inner", compact('news', 'categories'));
    }
}
