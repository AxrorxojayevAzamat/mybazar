<?php

namespace App\Http\Controllers;

use App\Entity\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\Product;
use App\Helpers\LanguageHelper;
use App\Helpers\ProductHelper;
use App\Entity\Blog\Post;
use App\Entity\Slider;
use App\Entity\Blog\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $query = Product::orderByDesc('created_at');
        $products_bestsellers = $query->where(['bestseller' => true, 'status' => Product::STATUS_ACTIVE])->limit(12)->get();
        $dayProducts = Product::where(['bestseller' => true, 'status' => Product::STATUS_ACTIVE])
            ->where('discount', '>', 0)->where('discount_ends_at', '>', date('Y-m-d H:i:s'))
            ->orderByDesc('discount')->limit(9)->get();
        $products_new = $query->limit(12)->where(['new' => true])->get();
        $categories = Category::get()->toTree();
        $brands = Brand::orderByDesc('created_at')->limit(24)->get();
        $blogs = Post::orderByDesc('created_at')->where(['is_published' => true])->limit(12)->get();
        $sliders = Slider::orderByDesc('sort')->get();
        $slidersCount = $sliders->count();


//        dd($sliders);
        $videos = Video::orderByDesc('created_at')->where(['is_published' => true])->limit(12)->get();
        return view('home', compact('products_new', 'categories', 'brands', 'products_bestsellers',
            'blogs', 'videos', 'sliders', 'slidersCount', 'dayProducts'));
    }
}
