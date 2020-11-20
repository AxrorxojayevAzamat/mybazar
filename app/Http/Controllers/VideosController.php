<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Blog\Video;
use App\Entity\Shop\Product;
use Illuminate\Database\Eloquent\Collection;

class VideosController extends Controller
{

    public function index()
    {

        $videos = Video::orderByDesc('created_at')->with(['category'])->paginate(20);
        $categories = Category::orderByDesc('created_at')->get();
//        $parentIds = [];
//        foreach($categories as $i => $category) {
//            $parentIds[$i] = [
//                'id' => $category->parent_id
//            ];
//        }
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();
        return view('videoblog.videoblog', compact('videos', 'categories', 'recentProducts'));
    }

    public function show(Video $video)
    {
        $video = $video->load(['category']);
        $videos = Video::where('id', '!=', $video->id)->orderByDesc('created_at')->limit(20)->get()->random(3);
        $categories = $this->getCategories();
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();
        return view('videoblog.videoblog-view', compact('video', 'categories', 'recentProducts', 'videos'));
    }


    private function getCategories(): Collection
    {
        return Category::orderByDesc('created_at')->get();
    }
}
