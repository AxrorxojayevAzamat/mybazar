<?php

namespace App\Http\Controllers;

use App\Models\Videos;

class VideoBlogController extends Controller
{

    public function videoBlog()
    {
        $query = Videos::orderByDesc('created_at');
        $categories = $query->paginate(12); //paginate() {{$products->links()}} render qlish uchun kere.
        $category = $query->paginate(12); // boshqa payt, get() ni ishlatsayam boladi
        return view('videoblog.video-blog', compact('categories', 'category'));
    }

}
