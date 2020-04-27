<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brands\CreateRequest;
use App\Http\Requests\Admin\Brands\UpdateRequest;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderByDesc('id')->paginate(20);

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(CreateRequest $request)
    {
        $category = Brand::create([
            'name_uz' => $request['name_uz'],
            'name_ru' => $request['name_ru'],
            'name_en' => $request['name_en'],
            'slug' => $request['slug'],
            'logo' => $request->logo ? $request->logo->store('images/brands', 'public') : null,
        ]);

        return redirect()->route('admin.brands.show', $category);
    }

    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(UpdateRequest $request, Brand $brand)
    {
        $brand->update([
            'name_uz' => $request['name_uz'],
            'name_ru' => $request['name_ru'],
            'name_en' => $request['name_en'],
            'slug' => $request['slug'],
            'logo' => $request->logo ? $request->logo->store('brands', 'public') : null,
        ]);

        return redirect()->route('admin.brands.show', $brand);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin.brands.index');
    }
}
