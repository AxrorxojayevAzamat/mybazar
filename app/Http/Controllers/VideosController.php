<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use App\Models\VideosCategory;

class VideosController extends Controller
{

    public function index()
    {

        $videos = Videos::orderByDesc('created_at')->where(['is_published' => true])->with(['category'])->paginate(20);
        $categories = VideosCategory::get();
        return view('videoblog.video-blog', compact('videos', 'categories'));
    }

    public function show(Videos $video)
    {
        $video = $video->load(['category']);
        $categories = VideosCategory::get();

        return view('videoblog.video-blog-inner', compact('video', 'categories'));
    }

}
