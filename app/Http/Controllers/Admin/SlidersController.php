<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Slider;
use App\Http\Requests\Admin\Sliders\CreateRequest;
use App\Http\Requests\Admin\Sliders\UpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\Manage\SliderService;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ImageHelper;

class SlidersController extends Controller {

    private $service;

    public function __construct(SliderService $service) {
        $this->middleware('can:manage-sliders');
        $this->service = $service;
    }

    public function index() {
        $sliders = Slider::orderBy('sort')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create() {
        return view('admin.sliders.create');
    }

    public function store(CreateRequest $request) {
        $slider = $this->service->create($request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.sliders.show', $slider);
    }

    public function show(Slider $slider) {
        return view('admin.sliders.show', compact('slider'));
    }

    public function edit(Slider $slider) {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(UpdateRequest $request, Slider $slider) {
        $slider = $this->service->update($slider->id, $request);
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.sliders.show', $slider);
    }

    public function destroy(Slider $slider) {
        if ($slider->created_by !== Auth::user()->id && !Auth::user()->isAdmin()) {
            return redirect()->route('admin.sliders.index');
        }

        Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_SLIDERS . '/' . $slider->id);

        $slider->delete();

        return redirect()->route('admin.sliders.index');
    }

    public function first(Slider $slider) {

        $sliders = Slider::orderBy('sort')->get();

        try {
            $this->service->moveSliderToFirst($sliders, $slider->id);
            return redirect()->route('admin.sliders.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function up(Slider $slider) {

        $sliders = Slider::orderBy('sort')->get();

        try {
            $this->service->moveSliderUp($sliders, $slider->id);
            return redirect()->route('admin.sliders.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function down(Slider $slider) {

        $sliders = Slider::orderBy('sort')->get();

        try {
            $this->service->moveSliderDown($sliders, $slider->id);
            return redirect()->route('admin.sliders.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function last(Slider $slider) {

        $sliders = Slider::orderBy('sort')->get();

        try {
            $this->service->moveSliderToLast($sliders, $slider->id);
            return redirect()->route('admin.sliders.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

}
