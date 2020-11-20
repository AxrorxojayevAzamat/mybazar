<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Page;
use App\Helpers\PageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\CreateRequest;
use App\Http\Requests\Admin\Pages\UpdateRequest;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-pages');
    }

    public function index()
    {
        $pages = Page::defaultOrder()->withDepth()->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $parents = PageHelper::getPageList();

        return view('admin.pages.create', compact('parents'));
    }

    public function store(CreateRequest $request)
    {
        $page = Page::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'menu_title_uz' => $request->menu_title_uz,
            'menu_title_ru' => $request->menu_title_ru,
            'menu_title_en' => $request->menu_title_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'body_uz' => $request->body_uz,
            'body_ru' => $request->body_ru,
            'body_en' => $request->body_en,
            'parent_id' => $request->parent_id,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.pages.show', $page);
    }

    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        $parents = PageHelper::getPageList();

        return view('admin.pages.edit', compact('page', 'parents'));
    }

    public function update(UpdateRequest $request, Page $page)
    {
        $page->cacheFor = 0;
        $page->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'menu_title_uz' => $request->menu_title_uz,
            'menu_title_ru' => $request->menu_title_ru,
            'menu_title_en' => $request->menu_title_en,
            'description_uz' => $request->description_uz,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'body_uz' => $request->body_uz,
            'body_ru' => $request->body_ru,
            'body_en' => $request->body_en,
            'parent_id' => $request->parent_id,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.pages.show', $page);
    }

    public function first(Page $page)
    {
        if ($first = $page->siblings()->defaultOrder()->first()) {
            $page->cacheFor = 0;
            $page->insertBeforeNode($first);
        }

        return redirect()->route('admin.pages.index');
    }

    public function up(Page $page)
    {
        $page->cacheFor = 0;
        $page->up();

        return redirect()->route('admin.pages.index');
    }

    public function down(Page $page)
    {
        $page->cacheFor = 0;
        $page->down();

        return redirect()->route('admin.pages.index');
    }

    public function last(Page $page)
    {
        if ($last = $page->siblings()->defaultOrder('desc')->first()) {
            $page->cacheFor = 0;
            $page->insertAfterNode($last);
        }

        return redirect()->route('admin.pages.index');
    }

    public function destroy(Page $page)
    {
        $page->cacheFor = 0;
        $page->delete();

        return redirect()->route('admin.pages.index');
    }
}
