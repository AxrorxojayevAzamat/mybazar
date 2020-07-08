<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sliders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:manage-shop-products');
    }

    public function index()
    {
        $posts = Sliders::paginate(10);
        return view('admin.sliders.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ));

        $post = new Sliders();
        $post->sort = $request->sort;
        $post->url = $request->url;
        if($request->hasFile('file')){
            $path = $request->file('file')->store('public/sliders/');
            $post->file = $request->file('file')->hashName();
        }

        $post->save();


        return redirect('/admin/sliders');
    }


    public function show(Sliders $slider)
    {
        $post = $slider;

        return view('admin.sliders.show', compact('post'));
    }

    public function edit(Sliders $slider)
    {
        $post = $slider;
        return view('admin.sliders.edit', compact('post'));
    }

    public function update(Request $request, Sliders $sliders)
    {
        $post = $sliders;
        $this->validate($request, array(
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));

        $post->sort = $request->sort;
        $post->url = $request->url;

        if($request->hasFile('file')){
            Storage::delete('public/sliders/'.$post->file);
            $request->file('file')->store('public/sliders/');
            $post->file = $request->file('file')->hashName();
        }
        $post->file = $request->file('file')->hashName();
        $post->update();



        return redirect('/admin/sliders');
    }

    public function destroy(Sliders $sliders)
    {
        $post = $sliders;
        if($post->file){
            Storage::delete('public/sliders/'.$post->file);
        }

        $post->delete();

        return redirect('/admin/sliders');
    }
}
