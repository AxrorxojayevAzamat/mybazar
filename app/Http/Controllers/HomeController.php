<?php

namespace App\Http\Controllers;

use App\Entity\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\Product;
use App\Helpers\LanguageHelper;
use App\Helpers\ProductHelper;
use App\Models\Post;
use App\Models\Sliders;
use App\Models\Videos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $query = Product::orderByDesc('created_at');
        $products_bestsellers = $query->where(['bestseller' => true,'status' => Product::STATUS_ACTIVE])->limit(12)->get();
        $products_new = $query->limit(12)->where(['new' => true])->get();
        $categories = Category::get()->toTree();
        $brands = Brand::orderByDesc('created_at')->limit(24)->get();
        $blogs = Post::orderByDesc('created_at')->where(['is_published' => true])->limit(12)->get();
        $sliders = Sliders::orderByDesc('sort')->get();
        $sliders_count = $sliders->count();


//        dd($sliders);
        $videos = Videos::orderByDesc('created_at')->where(['is_published' => true])->limit(12)->get();
        return view('pages.index',compact('products_new', 'categories', 'brands','products_bestsellers', 'blogs','videos','sliders','sliders_count'));
    }
}
