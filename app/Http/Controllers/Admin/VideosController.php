<?php

namespace App\Http\Controllers\Admin;


use App\Models\Videos;
use App\Models\VideosCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:manage-shop-products');
    }

    public function index()
    {
        $posts = Videos::with(['user', 'category'])->paginate(10);
        return view('admin.videos.index', compact('posts'));
    }

    public function create()
    {
        $categories = VideosCategory::pluck('name_ru', 'id')->all();


        return view('admin.videos.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));

        $post = new Videos();
        $post->title_ru = $request->title_ru;
        $post->title_en = $request->title_en;
        $post->title_uz = $request->title_uz;
        $post->body_ru = $request->body_ru;
        $post->body_en = $request->title_en;
        $post->body_uz = $request->title_uz;
        $post->description_uz = $request->description_uz;
        $post->description_en = $request->description_en;
        $post->description_ru = $request->description_ru;
        $post->description_ru = $request->description_ru;
        $post->category_id = $request->category_id;
        $post->is_published = $request->is_published;

        if($request->hasFile('poster')){
            $path = $request->file('poster')->store('public/videos/');
            $post->poster = $request->file('poster')->hashName();
        }
        if($request->hasFile('video')){
            $path = $request->file('video')->store('public/videos/');
            $post->video = $request->file('video')->hashName();
        }

        $post->save();


        return redirect('/admin/videos');
    }


    public function show(Videos $video)
    {

        $post = $video->load(['user', 'category']);

        return view('admin.videos.show', compact('post'));
    }

    public function edit(Videos $video)
    {
        $categories = VideosCategory::pluck('name_ru', 'id')->all();
        $post = $video;
        return view('admin.videos.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Videos $video)
    {
        $post = $video;
        $this->validate($request, array(
            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
        $post->title_ru = $request->title_ru;
        $post->title_en = $request->title_en;
        $post->title_uz = $request->title_uz;
        $post->body_ru = $request->body_ru;
        $post->body_en = $request->title_en;
        $post->body_uz = $request->title_uz;
        $post->description_uz = $request->description_uz;
        $post->description_en = $request->description_en;
        $post->description_ru = $request->description_ru;
        $post->description_ru = $request->description_ru;
        $post->category_id = $request->category_id;
        $post->is_published = $request->is_published;


        if($request->hasFile('poster')){
            Storage::delete('public/videos/'.$post->poster);
            $request->file('poster')->store('public/videos/');
            $post->poster = $request->file('poster')->hashName();
        }
        if($request->hasFile('video')){
            Storage::delete('public/videos/'.$post->video);
            $request->file('video')->store('public/videos/');
            $post->video = $request->file('video')->hashName();
        }
        $post->poster = $request->file('poster')->hashName();
        $post->video = $request->file('video')->hashName();
        $post->update();



        return redirect('/admin/videos');
    }

    public function destroy(Videos $video)
    {
        $post = $video;
        if($post->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
            return redirect('/admin/videos');
        }
        if($post->poster){
            Storage::delete('public/videos/'.$post->poster);
        }

        $post->delete();

        return redirect('/admin/videos');
    }
}
