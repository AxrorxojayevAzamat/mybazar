<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Shop\Characteristic;
use App\Entity\Shop\CharacteristicCategory;
use App\Entity\Shop\Product;
use App\Helpers\LanguageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Products\ValueRequest;
use App\Services\Manage\Shop\ProductService;

class ValueController extends Controller
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->middleware('can:manage-shop-characteristics');
        $this->service = $service;
    }

    public function create(Product $product)
    {
        $categories = array_merge($product->mainCategory->ancestors()->pluck('id')->toArray(), [$product->main_category_id]);
        $characteristics = CharacteristicCategory::whereIn('category_id', $categories)->pluck('characteristic_id')->toArray();
        $characteristics = Characteristic::whereIn('id', $characteristics)->orderByDesc('updated_at')
            ->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.products.values.create', compact('product', 'characteristics'));
    }

    public function store(ValueRequest $request, Product $product)
    {
        $value = $this->service->addValue($product->id, $request);
        try {
            return redirect()->route('admin.shop.products.values.show', ['product' => $product, 'characteristic' => $value->characteristic]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Product $product, Characteristic $characteristic)
    {
        $value = $product->values()->where('characteristic_id', $characteristic->id)->firstOrFail();

        return view('admin.shop.products.values.show', compact('product', 'characteristic', 'value'));
    }

    public function edit(Product $product, Characteristic $characteristic)
    {
        $value = $product->values()->where('characteristic_id', $characteristic->id)->firstOrFail();
        $categories = $product->productCategories()->pluck('category_id')->toArray();
        $characteristics = CharacteristicCategory::whereIn('category_id', $categories)->pluck('characteristic_id')->toArray();
        $characteristics = Characteristic::whereIn('id', $characteristics)->orderByDesc('updated_at')
            ->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.products.values.edit', compact('product', 'characteristic', 'value', 'characteristics'));
    }

    public function update(ValueRequest $request, Product $product, Characteristic $characteristic)
    {
        $value = $this->service->updateValue($product->id, $characteristic->id, $request);
        try {
            return redirect()->route('admin.shop.products.values.show', ['product' => $product, 'characteristic' => $value->characteristic]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Product $product, Characteristic $characteristic)
    {
        try {
            $this->service->removeValue($product->id, $characteristic->id);
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function first(Product $product, Characteristic $characteristic)
    {
        try {
            $this->service->moveValueToFirst($product->id, $characteristic->id);
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function up(Product $product, Characteristic $characteristic)
    {
        try {
            $this->service->moveValueUp($product->id, $characteristic->id);
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function down(Product $product, Characteristic $characteristic)
    {
        try {
            $this->service->moveValueDown($product->id, $characteristic->id);
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function last(Product $product, Characteristic $characteristic)
    {
        try {
            $this->service->moveValueToLast($product->id, $characteristic->id);
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
