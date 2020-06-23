<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->middleware('can:manage-shop-products');
    }

    public function index()
    {
        $posts = News::with(['user', 'category'])->paginate(10);
        return view('admin.news.index', compact('posts'));
    }

    public function create()
    {
        $categories = NewsCategory::pluck('name_ru', 'id')->all();


        return view('admin.news.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));

        $post = new News();
        $post->title_ru = $request->title_ru;
        $post->title_en = $request->title_en;
        $post->title_uz = $request->title_uz;
        $post->body_ru = $request->body_ru;
        $post->body_en = $request->title_en;
        $post->body_uz = $request->title_uz;
        $post->description_uz = $request->description_uz;
        $post->description_en = $request->description_en;
        $post->description_ru = $request->description_ru;
        $post->category_id = $request->category_id;
        $post->is_published = $request->is_published;
        if($request->hasFile('file')){
            $path = $request->file('file')->store('public/news/');
            $post->file = $request->file('file')->hashName();
        }

        $post->save();


        return redirect('/admin/news');
    }


    public function show(News $news)
    {
        $post = $news->load(['user', 'category']);

        return view('admin.news.show', compact('post'));
    }

    public function edit(News $news)
    {
        $categories = NewsCategory::pluck('name_ru', 'id')->all();
        $post = $news;
        return view('admin.news.edit', compact('post', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $post = $news;
        $this->validate($request, array(
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        $post->category_id = $request->category_id;
        $post->is_published = $request->is_published;


        if($request->hasFile('file')){
            Storage::delete('public/news/'.$post->file);
            $request->file('file')->store('public/news/');
            $post->file = $request->file('file')->hashName();
        }
        $post->file = $request->file('file')->hashName();
        $post->update();



        return redirect('/admin/news');
    }
    public function delete($id)
    {


        $news = News::findOrFail($id);

        $news->delete();

        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();

    }
    public function destroy(News $news)
    {
        $post = $news;
        if($post->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
            return redirect('/admin/news');
        }
        if($post->file){
            Storage::delete('public/news/'.$post->file);
        }

        $post->delete();

        return redirect('/admin/news');
    }
}
