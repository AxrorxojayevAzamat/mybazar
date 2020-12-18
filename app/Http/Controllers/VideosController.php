<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Blog\Video;
use App\Entity\Shop\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class VideosController extends Controller
{

    public function index(Request $request)
    {

        $videos = Video::published()->orderByDesc('created_at')->with(['category'])->paginate(20);
        if (isset($request->videoName)){
            $value = $request->videoName;
            $videos = Video::search($value)->where('status', Video::PUBLISHED)->paginate(10);
        }
        $videosCategoryId = $videos->pluck('category_id')->toArray();

        $categories = Category::whereIn('id', $videosCategoryId)->orderByDesc('created_at')->get();
        if (isset($request->categoryName)){
            $videos = $videos->where('category_id', $request->get('categoryName'));
        }

//        $parentIds = [];
//        foreach($categories as $i => $category) {
//            $parentIds[$i] = [
//                'id' => $category->parent_id
//            ];
//        }
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();
        return view('videoblog.videoblog', compact('videos', 'categories', 'recentProducts', 'parentCategory', 'rootCategoryShow'));
    }

    public function show(Video $video, Request $request)
    {
        $video = $video->load(['category']);
        $videos = Video::orderByDesc('created_at')->limit(3)->get();
        $categories = $this->getCategories();
        $recentProducts = Product::orderByDesc('created_at')->limit(8)->get();
        return view('videoblog.videoblog-view', compact('video', 'categories', 'recentProducts', 'videos'));
    }


    private function getCategories(): Collection
    {
        return Category::orderByDesc('created_at')->get();
    }
}
