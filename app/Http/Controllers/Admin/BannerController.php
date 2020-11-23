<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Banner;
use App\Entity\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use App\Services\Manage\BannerService;
use App\Http\Requests\Admin\Banners\CreateRequest;
use App\Http\Requests\Admin\Banners\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ImageHelper;
use App\Helpers\ProductHelper;

class BannerController extends Controller
{

    private $service;

    public function __construct(BannerService $service)
    {
        $this->middleware('can:manage-banners');
        $this->service = $service;
    }

    public function index()
    {
        $banners = Banner::paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        $categories = ProductHelper::getCategoryList();
        return view('admin.banners.create', compact('categories'));
    }

    public function store(CreateRequest $request)
    {
        $banner = $this->service->create($request);
        return redirect()->route('admin.banners.show', $banner);
    }

    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(UpdateRequest $request, Banner $banner)
    {
        $banner = $this->service->update($banner->id, $request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.banners.show', $banner);
    }

    public function destroy(Banner $banner)
    {
        if ($banner->created_by !== Auth::user()->id && !Auth::user()->isAdmin()) {
            return redirect()->route('admin.banners.index');
        }

        Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_BANNERS . '/' . $banner->id);

        $banner->delete();

        return redirect()->route('admin.banners.index');
    }

    public function publish(Banner $banner)
    {
        try {
            $this->service->publish($banner->id);

            return redirect()->route('admin.banners.show', $banner);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function discard(Banner $banner)
    {
        try {
            $this->service->discard($banner->id);
            session()->flash('message', 'запись обновлён ');
            return redirect()->route('admin.banners.show', $banner);
        } catch (\Exception $e) {
            session()->flash('error', 'Произошла ошибка');
            return back()->with('error', $e->getMessage());
        }
    }

    public function removeFile(Banner $banner)
    {
        if ($this->service->removeFile($banner->id)) {
            return response()->json('The file is successfully deleted!');
        }
        return response()->json('The file is not deleted!', 400);
    }

    private function getCategoriesList(): array
    {
        return Category::orderByDesc('created_at')->pluck('name_ru', 'id')->toArray();
    }

}
