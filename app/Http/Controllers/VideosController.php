<?php

namespace App\Http\Controllers;

use App\Entity\Blog\Category;
use App\Entity\Blog\Video;
use Illuminate\Database\Eloquent\Collection;

class VideosController extends Controller
{

    public function index()
    {

        $videos = Video::orderByDesc('created_at')->where(['is_published' => true])->paginate(20);
        $categories = $this->getCategories();
        return view('videoblog.video-blog', compact('videos', 'categories'));
    }

    public function show(Video $video)
    {
        $video = $video->load(['category']);
        $categories = $this->getCategories();

        return view('videoblog.video-blog-inner', compact('video', 'categories'));
    }


    private function getCategories(): Collection
    {
        return Category::where('type', Category::VIDEOS)->get();
    }
}
