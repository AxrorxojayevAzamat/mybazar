<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Entity\Blog\Post;
use App\Entity\Category;
use App\Helpers\ImageHelper;
use App\Helpers\ProductHelper;
use App\Http\Requests\Admin\Blog\Posts\CreateRequest;
use App\Http\Requests\Admin\Blog\Posts\UpdateRequest;
use App\Services\Manage\Blog\PostService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $service;

    public function __construct(PostService $service)
    {
        $this->middleware('can:manage-blog-posts');
        $this->service = $service;
    }

    public function index()
    {
        $posts = Post::with(['category'])->paginate(10);

        return view('admin.blog.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = ProductHelper::getCategoryList();

        return view('admin.blog.posts.create', compact('categories'));
    }


    public function store(CreateRequest $request)
    {
        $post = $this->service->create($request);
        session()->flash('message', 'запись обновлён ');

        return redirect()->route('admin.blog.posts.show', $post);
    }


    public function show(Post $post)
    {
        return view('admin.blog.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {

        $categories = ProductHelper::getCategoryList();

        return view('admin.blog.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $post = $this->service->update($post->id, $request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.blog.posts.show', $post);
    }

    public function destroy(Post $post)
    {
        if ($post->created_by !== Auth::user()->id && !Auth::user()->isAdmin()) {
            return redirect()->route('admin.blog.posts.index');
        }

        Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_POSTS . '/' . $post->id);

        $post->delete();

        return redirect()->route('admin.blog.posts.index');
    }

    public function publish(Post $post)
    {
        try {
            $this->service->publish($post->id);

            return redirect()->route('admin.blog.posts.show', $post);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function discard(Post $post)
    {
        try {
            $this->service->discard($post->id);

            return redirect()->route('admin.blog.posts.show', $post);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function removeFile(Post $post)
    {
        if ($this->service->removeFile($post->id)) {
            return response()->json('The file is successfully deleted!');
        }
        return response()->json('The file is not deleted!', 400);
    }

}
