<?php

namespace App\Http\Controllers\Admin\Blog;


use App\Entity\Category;
use App\Entity\Blog\Video;
use App\Helpers\ImageHelper;
use App\Helpers\ProductHelper;
use App\Http\Requests\Admin\Blog\Videos\CreateRequest;
use App\Http\Requests\Admin\Blog\Videos\UpdateRequest;
use App\Services\Manage\Blog\VideoService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    private $service;

    public function __construct(VideoService $service)
    {
        $this->middleware('can:manage-blog-videos');
        $this->service = $service;
    }

    public function index()
    {
        $videos = Video::paginate(10);

        return view('admin.blog.videos.index', compact('videos'));
    }

    public function create()
    {
        $categories = ProductHelper::getCategoryList();

        return view('admin.blog.videos.create', compact('categories'));
    }


    public function store(CreateRequest $request)
    {
        $video = $this->service->create($request);
        session()->flash('message', 'запись обновлён ');

        return redirect()->route('admin.blog.videos.show', $video);
    }


    public function show(Video $video)
    {
        return view('admin.blog.videos.show', compact('video'));
    }

    public function edit(Video $video)
    {
        $categories = ProductHelper::getCategoryList();
        return view('admin.blog.videos.edit', compact('video', 'categories'));
    }

    public function update(UpdateRequest $request, Video $video)
    {
        $video = $this->service->update($video->id, $request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.blog.videos.show', $video);
    }

    public function destroy(Video $video)
    {
        if($video->created_by != Auth::user()->id && !Auth::user()->isAdmin()) {
            return redirect()->route('admin.blog.videos.index');
        }

        Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_VIDEOS . '/' . $video->id);

        $video->delete();
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.blog.videos.index');
    }

    public function publish(Video $video)
    {
        try {
            $this->service->publish($video->id);

            return redirect()->route('admin.blog.videos.show', $video);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function discard(Video $video)
    {
        try {
            $this->service->discard($video->id);
            session()->flash('message', 'запись обновлён ');
            return redirect()->route('admin.blog.videos.show', $video);
        } catch (\Exception $e) {
            session()->flash('error', 'Произошла ошибка');
            return back()->with('error', $e->getMessage());
        }
    }

    public function removePoster(Video $video)
    {
        if ($this->service->removePoster($video->id)) {
            return response()->json('The poster is successfully deleted!');
        }
        return response()->json('The poster is not deleted!', 400);
    }

    public function removeVideo(Video $video)
    {
        if ($this->service->removeVideo($video->id)) {
            return response()->json('The video file is successfully deleted!');
        }
        return response()->json('The video file is not deleted!', 400);
    }

}
