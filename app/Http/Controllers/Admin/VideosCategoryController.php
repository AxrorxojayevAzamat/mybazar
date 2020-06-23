<?php

namespace App\Http\Controllers\Admin;

use App\Models\VideosCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideosCategoryController extends Controller
{

    public function index()
    {
        $categories = VideosCategory::withCount('videos')->paginate(10);

        return view('admin.videos_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.videos_categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ru' => 'required',
            'name_en' => 'required',
            'name_uz' => 'required',
        ]);

        VideosCategory::create([
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'name_uz' => $request->name_uz,
        ]);

        return redirect('/admin/videos-categories');
    }

    public function edit(VideosCategory $videosCategory)
    {
        $category = $videosCategory;
        return view('admin.videos_categories.edit', compact('category'));
    }

    public function show(VideosCategory $videosCategory)
    {
        $category = $videosCategory;
        return view('admin.videos_categories.show', compact('category'));
    }


    public function update(Request $request, VideosCategory $videosCategory)
    {
        $category = $videosCategory;
        $this->validate($request, ['name_ru' => 'required']);

        $category->update($request->all());

        return redirect('/admin/videos-categories');
    }


    public function destroy(VideosCategory $videosCategory)
    {
        $videosCategory->delete();

        return redirect('/admin/videos-categories');
    }
}
