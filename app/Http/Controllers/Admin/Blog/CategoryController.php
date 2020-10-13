<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Entity\Blog\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:manage-blog-categories');
    }

    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.blog.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_uz' => 'required|string|max:255',
            'type' => 'required|numeric|min:1'
        ]);

        $category = Category::create([
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'name_uz' => $request->name_uz,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.blog.categories.show', $category);
    }

    public function edit(Category $category)
    {
        return view('admin.blog.categories.edit', compact('category'));
    }

    public function show(Category $category)
    {
        return view('admin.blog.categories.show', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_uz' => 'required|string|max:255',
            'type' => 'required|numeric|min:1'
        ]);

        $category->update($request->all());

        return redirect()->route('admin.blog.categories.show', $category);
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/admin/categories');
    }
}
