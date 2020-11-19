<?php

namespace App\Http\Controllers;

use App\Entity\Banner;
use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Shop\Product;
use App\Entity\Store;
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
        $bestsellerProducts = $query->where(['bestseller' => true, 'status' => Product::STATUS_ACTIVE])->limit(12)->get();
        $dayProducts = Product::where(['bestseller' => true, 'status' => Product::STATUS_ACTIVE])
            ->where('discount', '>', 0)->where('discount_ends_at', '>', date('Y-m-d H:i:s'))
            ->orderByDesc('discount')->limit(9)->get();
        $newProducts = $query->limit(12)->where(['new' => true])->get();
        $brands = Brand::orderByDesc('created_at')->limit(24)->get();
        $posts = Post::published()->orderByDesc('created_at')->limit(12)->get();
        $videos = Video::published()->orderByDesc('created_at')->limit(12)->get();
        $sliders = Slider::orderByDesc('sort')->get();
        $slidersCount = $sliders->count();
        $threeBanners = Banner::published()->inRandomOrder()->limit(3)->get();
        $shops1 = $query->where(['status' => Product::STATUS_ACTIVE])->limit(3)->get();
        $shops2 = $query->where(['status' => Product::STATUS_ACTIVE])->inRandomOrder()->limit(1)->get();
        $shops2ThreeItems = $query->where(['status' => Product::STATUS_ACTIVE])->limit(4)->get();


        return view('home', compact('newProducts', 'brands', 'bestsellerProducts',
            'posts', 'videos', 'sliders', 'slidersCount', 'dayProducts' ,'threeBanners','shops1','shops2','shops2ThreeItems'));
    }

}
