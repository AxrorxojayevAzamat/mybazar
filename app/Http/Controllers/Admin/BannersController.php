<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\Manage\BannerService;
use App\Http\Requests\Admin\Banners\CreateRequest;
use App\Http\Requests\Admin\Banners\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ImageHelper;

class BannersController extends Controller {

    private $service;

    public function __construct(BannerService $service) {
        $this->middleware('can:manage-banners');
        $this->service = $service;
    }

    public function index() {
        $banners = Banner::paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    public function create() {
        return view('admin.banners.create');
    }

    public function store(CreateRequest $request) {
        $banner = $this->service->create($request);
        return redirect()->route('admin.banners.show', $banner);
    }

    public function show(Banner $banner) {
        return view('admin.banners.show', compact('banner'));
    }

    public function edit(Banner $banner) {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(UpdateRequest $request, Banner $banner) {
        $banner = $this->service->update($banner->id, $request);
        return redirect()->route('admin.banners.show', $banner);
    }

    public function destroy(Banner $banner) {
        if ($banner->created_by !== Auth::user()->id && !Auth::user()->isAdmin()) {
            return redirect()->route('admin.banners.index');
        }

        Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_BANNERS . '/' . $banner->id);

        $banner->delete();

        return redirect()->route('admin.banners.index');
    }

    public function publish(Banner $banner) {
        $banner->publish();
        $banner->save();

        return redirect()->back();
    }

    public function discard(Banner $banner) {
        $banner->discard();
        $banner->save();

        return redirect()->back();
    }

    public function removeFile(Banner $banner) {
        if ($this->service->removeFile($banner->id)) {
            return response()->json('The file is successfully deleted!');
        }
        return response()->json('The file is not deleted!', 400);
    }

}
