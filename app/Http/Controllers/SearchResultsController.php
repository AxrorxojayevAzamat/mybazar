<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Shop\Product;
use App\Models\Post;
use App\Models\Videos;
use App\Models\VideosCategory;

class SearchResultsController extends Controller
{
    public function searchResults() {
        $query = Product::orderByDesc('created_at');
        $product = $query->paginate(12); //paginate() {{$products->links()}} render qlish uchun kere.
        $products = $query->paginate(12); // boshqa payt, get() ni ishlatsayam boladi
        $blogs = Post::orderByDesc('created_at')->where(['is_published' => true])->paginate(20);
        $videos = Videos::orderByDesc('created_at')->where(['is_published' => true])->with(['category'])->paginate(20);
        $categories = \App\Models\Category::get();
        return view('pages.search-results',compact('product','products'), compact('blogs','categories'), compact('videos','categories')); //compact ichidigi peremenniyla , view digi blade ga beriladi.
    }
    
}
