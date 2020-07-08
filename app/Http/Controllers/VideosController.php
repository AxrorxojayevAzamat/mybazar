<?php

namespace App\Http\Controllers;

use App\Entity\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\Product;
use App\Helpers\LanguageHelper;
use App\Helpers\ProductHelper;
use App\Models\Post;
use App\Models\Videos;
use App\Models\VideosCategory;
use Illuminate\Http\Request;

class VideosController extends Controller
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

        $videos = Videos::orderByDesc('created_at')->where(['is_published' => true])->with(['category'])->paginate(20);
        $categories = VideosCategory::get();
        return view('pages.video-blog',compact('videos','categories'));
    }

    public function show(Videos $video){
        $video = $video->load(['category']);
        $categories = VideosCategory::get();

        return view('pages.video-blog-inner', compact('video', 'categories'));
    }
}
