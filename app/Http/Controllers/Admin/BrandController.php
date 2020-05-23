<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Brand;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brands\CreateRequest;
use App\Http\Requests\Admin\Brands\UpdateRequest;
use App\Services\Manage\BrandService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    private $service;

    public function __construct(BrandService $service)
    {
        $this->middleware('can:manage-brands');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Brand::orderByDesc('updated_at');

        if (!empty($value = $request->get('name'))) {
            $query->where(function ($query) use ($value) {
                $query->where('name_uz', 'ilike', '%' . $value . '%')
                    ->orWhere('name_ru', 'ilike', '%' . $value . '%')
                    ->orWhere('name_en', 'ilike', '%' . $value . '%');
            });
        }

        $brands = $query->paginate(20);

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(CreateRequest $request)
    {
        $brand = $this->service->create($request);

        return redirect()->route('admin.brands.show', $brand);
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
        $brand = $this->service->update($brand->id, $request);

        return redirect()->route('admin.brands.show', $brand);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin.brands.index');
    }

    public function removeLogo(Brand $brand)
    {
        if ($this->service->removeLogo($brand->id)) {
            return response()->json('The logo is successfully deleted!');
        }
        return response()->json('The logo is not deleted!', 400);
    }
}
