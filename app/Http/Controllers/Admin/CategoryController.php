<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::withCount('posts')->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ru' => 'required',
            'name_en' => 'required',
            'name_uz' => 'required',
        ]);

        Category::create([
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'name_uz' => $request->name_uz,
        ]);

        return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $this->validate($request, ['name_ru' => 'required']);

        $category->update($request->all());

        return redirect('/admin/categories');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/admin/categories');
    }
}
