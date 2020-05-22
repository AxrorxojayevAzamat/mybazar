<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Shop\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Categories\CreateRequest;
use App\Http\Requests\Admin\Shop\Categories\UpdateRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-shop-categories');
    }

    public function index()
    {
        $categories = Category::defaultOrder()->withDepth()->get();

        return view('admin.shop.categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::defaultOrder()->withDepth()->get();

        return view('admin.shop.categories.create', compact('parents'));
    }

    public function store(CreateRequest $request)
    {
        $category = Category::create([
            'name_uz' => $request['name_uz'],
            'name_ru' => $request['name_ru'],
            'name_en' => $request['name_en'],
            'description_uz' => $request['description_uz'],
            'description_ru' => $request['description_ru'],
            'description_en' => $request['description_en'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.shop.categories.show', $category);
    }

    public function show(Category $category)
    {
        return view('admin.shop.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $parents = Category::defaultOrder()->withDepth()->get();

        return view('admin.shop.categories.edit', compact('category', 'parents'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->update([
            'name_uz' => $request['name_uz'],
            'name_ru' => $request['name_ru'],
            'name_en' => $request['name_en'],
            'description_uz' => $request['description_uz'],
            'description_ru' => $request['description_ru'],
            'description_en' => $request['description_en'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.shop.categories.show', $category);
    }

    public function first(Category $category)
    {
        if ($first = $category->siblings()->defaultOrder()->first()) {
            $category->insertBeforeNode($first);
        }

        return redirect()->route('admin.shop.categories.index');
    }

    public function up(Category $category)
    {
        $category->up();

        return redirect()->route('admin.shop.categories.index');
    }

    public function down(Category $category)
    {
        $category->down();

        return redirect()->route('admin.shop.categories.index');
    }

    public function last(Category $category)
    {
        if ($last = $category->siblings()->defaultOrder('desc')->first()) {
            $category->insertAfterNode($last);
        }

        return redirect()->route('admin.shop.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.shop.categories.index');
    }
}
