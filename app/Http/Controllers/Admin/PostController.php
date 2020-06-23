<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category'])->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('name_ru', 'id')->all();


        return view('admin.posts.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));

        $post = new Post();
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
        if($request->hasFile('file')){
            $path = $request->file('file')->store('public/posts/');
            $post->file = $request->file('file')->hashName();
        }

        $post->save();


        return redirect('/admin/posts');
    }


    public function show(Post $post)
    {
        $post = $post->load(['user', 'category']);

        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {

        $categories = Category::pluck('name_ru', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {

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
        $post->description_ru = $request->description_ru;
        $post->category_id = $request->category_id;
        $post->is_published = $request->is_published;


        if($request->hasFile('file')){
            Storage::delete('public/posts/'.$post->file);
            $request->file('file')->store('public/posts/');
            $post->file = $request->file('file')->hashName();
        }
        $post->file = $request->file('file')->hashName();
        $post->update();



        return redirect('/admin/posts');
    }

    public function destroy(Post $post)
    {
        if($post->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
            return redirect('/admin/posts');
        }
        if($post->file){
            Storage::delete('public/posts/'.$post->file);
        }

        $post->delete();

        return redirect('/admin/posts');
    }

    public function publish(Post $post)
    {
        $post->is_published = !$post->is_published;
        $post->save();

        return redirect('/admin/posts');
    }
}
