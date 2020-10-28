<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Brand;
use App\Entity\Category;
use App\Helpers\LanguageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Categories\CreateRequest;
use App\Http\Requests\Admin\Shop\Categories\UpdateRequest;
use App\Services\Manage\Shop\CategoryService;

class CategoryController extends Controller
{
    private $service;

    public function __construct(CategoryService $service)
    {
        $this->middleware('can:manage-categories');
        $this->service = $service;
    }

    public function index()
    {
        $categories = Category::defaultOrder()->withDepth()->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::defaultOrder()->withDepth()->get();
        $brands = Brand::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.categories.create', compact('parents', 'brands'));
    }

    public function store(CreateRequest $request)
    {
        $category = $this->service->create($request);

        return redirect()->route('admin.categories.show', $category);
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $parents = Category::defaultOrder()->withDepth()->get();
        $brands = Brand::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.categories.edit', compact('category', 'parents', 'brands'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category = $this->service->update($category->id, $request);

        return redirect()->route('admin.categories.show', $category);
    }

    public function first(Category $category)
    {
        if ($first = $category->siblings()->defaultOrder()->first()) {
            $category->insertBeforeNode($first);
        }

        return redirect()->route('admin.categories.index');
    }

    public function up(Category $category)
    {
        $category->up();

        return redirect()->route('admin.categories.index');
    }

    public function down(Category $category)
    {
        $category->down();

        return redirect()->route('admin.categories.index');
    }

    public function last(Category $category)
    {
        if ($last = $category->siblings()->defaultOrder('desc')->first()) {
            $category->insertAfterNode($last);
        }

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $this->service->remove($category->id);

        return redirect()->route('admin.categories.index');
    }

    public function removePhoto(Category $category)
    {
        if ($this->service->removePhoto($category->id)) {
            return response()->json('The logo is successfully deleted!');
        }
        return response()->json('The logo is not deleted!', 400);
    }

    public function removeIcon(Category $category)
    {
        if ($this->service->removeIcon($category->id)) {
            return response()->json('The logo is successfully deleted!');
        }
        return response()->json('The logo is not deleted!', 400);
    }
}
