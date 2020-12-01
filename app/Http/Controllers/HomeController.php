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
use App\Services\Sms\SmsSender;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $sms;

    public function __construct(SmsSender $sms)
    {
//        $this->middleware('auth');
        $this->sms = $sms;
    }

    public function index()
    {
        $query = Product::orderByDesc('created_at');
        $bestsellerProducts = $query->where(['bestseller' => true, 'status' => Product::STATUS_ACTIVE])->limit(12)->get();
        $dayProducts = Product::where(['bestseller' => true, 'status' => Product::STATUS_ACTIVE])
            ->where('discount', '>', 0)
            ->where('discount_ends_at', '>', date('Y-m-d H:i:s'))
            ->orderByDesc('discount')
            ->limit(9)
            ->get();
        $newProducts = $query->limit(12)->where(['new' => true])->get();
        $recomended = Product::limit(12)->where('number_of_reviews','>=',30)->get();
        $threeBanners = Banner::published()->where('type', Banner::TYPE_SHORT)->inRandomOrder()->limit(3)->get();
        $longBanner1 = Banner::published()->where('type', Banner::TYPE_LONG)->inRandomOrder()->first();
        $longBanner2 = Banner::published()->where('type', Banner::TYPE_LONG)
            ->where('id', '!=', $longBanner1 ? $longBanner1->id : 0)->inRandomOrder()->first();
        $posts = Post::published()->orderByDesc('created_at')->limit(6)->get();
        $brands = Brand::orderByDesc('created_at')->limit(24)->get();
        $videos = Video::published()->orderByDesc('created_at')->limit(12)->get();
        $sliders = Slider::orderByDesc('sort')->get();
        $slidersCount = $sliders->count();
        $shops1 = $query->where(['status' => Product::STATUS_ACTIVE])->limit(3)->get();
        $shops2 = $query->where(['status' => Product::STATUS_ACTIVE])->inRandomOrder()->limit(1)->get();
        $shops2ThreeItems = $query->where(['status' => Product::STATUS_ACTIVE])->limit(10)->get();

        return view('home', compact('newProducts', 'brands', 'bestsellerProducts',
            'posts', 'videos', 'sliders', 'slidersCount', 'dayProducts' ,'threeBanners','shops1','shops2','shops2ThreeItems',
            'longBanner1', 'longBanner2', 'recomended'));
    }

}
