<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:manage-shop-products');
    }

    public function index()
    {
        $posts = Banner::paginate(10);
        return view('admin.banners.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug'  => 'required|string|unique:banners',
        ));

        $post = new Banner();
        $post->title_ru = $request->title_ru;
        $post->title_en = $request->title_en;
        $post->title_uz = $request->title_uz;
        $post->description_uz = $request->description_uz;
        $post->description_en = $request->description_en;
        $post->description_ru = $request->description_ru;
        $post->description_ru = $request->description_ru;
        $post->is_published = $request->is_published;
        $post->slug = $request->slug;
        $post->url = $request->url;
        if($request->hasFile('file')){
            $path = $request->file('file')->store('public/banners/');
            $post->file = $request->file('file')->hashName();
        }

        $post->save();


        return redirect('/admin/banners');
    }


    public function show(Banner $banners)
    {
        $post = $banners;

        return view('admin.banners.show', compact('post'));
    }

    public function edit(Banner $banner)
    {
        $post = $banner;
        return view('admin.banners.edit', compact('post'));
    }

    public function update(Request $request, Banner $banners)
    {
        $post = $banners;
        $this->validate($request, array(
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'slug'  => 'required|string|unique:banners',
        ));
        $post->title_ru = $request->title_ru;
        $post->title_en = $request->title_en;
        $post->title_uz = $request->title_uz;
        $post->description_uz = $request->description_uz;
        $post->description_en = $request->description_en;
        $post->description_ru = $request->description_ru;
        $post->description_ru = $request->description_ru;
        $post->is_published = $request->is_published;
        $post->slug = $request->slug;
        $post->url = $request->url;


        if($request->hasFile('file')){
            Storage::delete('public/banners/'.$post->file);
            $request->file('file')->store('public/banners/');
            $post->file = $request->file('file')->hashName();
        }
        $post->file = $request->file('file')->hashName();
        $post->update();



        return redirect('/admin/banners');
    }

    public function destroy(Banner $banners)
    {
        $post = $banners;
        if($post->file){
            Storage::delete('public/banners/'.$post->file);
        }

        $post->delete();

        return redirect('/admin/banners');
    }
}
