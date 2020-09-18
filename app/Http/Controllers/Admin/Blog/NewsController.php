<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Entity\Blog\Category;
use App\Entity\Blog\News;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Blog\News\CreateRequest;
use App\Http\Requests\Admin\Blog\News\UpdateRequest;
use App\Services\Manage\Blog\NewsService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    private $service;

    public function __construct(NewsService $service)
    {
        $this->middleware('can:manage-blog-news');
        $this->service = $service;
    }

    public function index()
    {
        $news = News::paginate(10);

        return view('admin.blog.news.index', compact('news'));
    }

    public function create()
    {
        $categories = $this->getCategoriesList();

        return view('admin.blog.news.create', compact('categories'));
    }


    public function store(CreateRequest $request)
    {
        $post = $this->service->create($request);

        return redirect()->route('admin.blog.news.show', $post);
    }


    public function show(News $news)
    {
        return view('admin.blog.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $categories = $this->getCategoriesList();

        return view('admin.blog.news.edit', compact('news', 'categories'));
    }

    public function update(UpdateRequest $request, News $news)
    {
        $post = $this->service->update($news->id, $request);

        return redirect()->route('admin.blog.news.show', $post);
    }

    public function destroy(News $news)
    {
        if ($news->created_by !== Auth::user()->id && !Auth::user()->isAdmin()) {
            return redirect()->route('admin.blog.news.index');
        }

        Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_NEWS . '/' . $news->id);

        $news->delete();

        return redirect()->route('admin.blog.news.index');
    }

    public function publish(News $news)
    {
        $news->publish();
        $news->save();

        return redirect()->back();
    }

    public function discard(News $news)
    {
        $news->discard();
        $news->save();

        return redirect()->back();
    }

    public function removeFile(News $news)
    {
        if ($this->service->removeFile($news->id)) {
            return response()->json('The file is successfully deleted!');
        }
        return response()->json('The file is not deleted!', 400);
    }

    private function getCategoriesList(): array
    {
        return Category::where('type', Category::NEWS)->pluck('name_ru', 'id')->toArray();
    }
}
