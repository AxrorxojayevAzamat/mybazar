<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{

    public function index()
    {
        $categories = NewsCategory::withCount('news')->paginate(10);

        return view('admin.news_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.news_categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ru' => 'required',
            'name_en' => 'required',
            'name_uz' => 'required',
        ]);

        NewsCategory::create([
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'name_uz' => $request->name_uz,
        ]);

        return redirect('/admin/news-categories');
    }

    public function edit(NewsCategory $newsCategory)
    {
        $category = $newsCategory;
        return view('admin.news_categories.edit', compact('category'));
    }

    public function show(NewsCategory $newsCategory)
    {
        $category = $newsCategory;
        return view('admin.news_categories.show', compact('category'));
    }


    public function update(Request $request, NewsCategory $newsCategory)
    {
        $category = $newsCategory;
        $this->validate($request, ['name_ru' => 'required']);

        $category->update($request->all());

        return redirect('/admin/news-categories');
    }


    public function destroy(NewsCategory $newsCategory)
    {
        $newsCategory->delete();

        return redirect('/admin/news-categories');
    }
}
