<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Shop\Modification;
use App\Entity\Shop\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Modifications\CreateRequest;
use App\Http\Requests\Admin\Shop\Modifications\UpdateRequest;
use App\Services\Shop\ProductService;

class ModificationController extends Controller
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->middleware('can:manage-shop-products');
        $this->service = $service;
    }

    public function create(Product $product)
    {
        return view('admin.shop.modifications.create', compact('product'));
    }

    public function store(Product $product, CreateRequest $request)
    {
        try {
            $modification = $this->service->addModification($product->id, $request);
            return redirect()->route('admin.shop.modifications.show', ['product' => $product, 'modification' => $modification]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Product $product, Modification $modification)
    {
        return view('admin.shop.modifications.show', compact('product', 'modification'));
    }

    public function edit(Product $product, Modification $modification)
    {
        return view('admin.shop.modifications.edit', compact('product', 'modification'));
    }

    public function update(UpdateRequest $request, Product $product, Modification $modification)
    {
        try {
            $this->service->updateModification($product->id, $modification->id, $request);
            return redirect()->route('admin.shop.modifications.show', ['product' => $product, 'modification' => $modification]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Product $product, Modification $modification)
    {
        try {
            $this->service->removeModification($product->id, $modification->id);
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function first(Product $product, Modification $modification)
    {
        try {
            $this->service->moveModificationToFirst($product->id, $modification->id);
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function up(Product $product, Modification $modification)
    {
        try {
            $this->service->moveModificationUp($product->id, $modification->id);
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function down(Product $product, Modification $modification)
    {
        try {
            $this->service->moveModificationDown($product->id, $modification->id);
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function last(Product $product, Modification $modification)
    {
        try {
            $this->service->moveModificationToLast($product->id, $modification->id);
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
