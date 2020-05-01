<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Helpers\LanguageHelper;
use App\Helpers\ProductHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Products\CreateRequest;
use App\Http\Requests\Admin\Shop\Products\UpdateRequest;
use App\Services\Shop\ProductService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->middleware('can:manage-shop-products');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $products = Product::orderByDesc('updated_at')->paginate(20);

        return view('admin.shop.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->service->getCategoryList();
        $stores = Store::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $brands = Brand::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.products.create', compact('categories', 'stores', 'brands'));
    }

    public function store(Request $request)
    {
        dd($this->validate($request, [
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_uz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'slug' => 'required|string|max:255',
            'price_uzs' => 'required|numeric|min:0',
            'price_usd' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'store_id' => 'required|numeric|min:1',
            'brand_id' => 'required|numeric|min:1',
            'status' => ['required', 'numeric', Rule::in(array_keys(ProductHelper::getStatusList()))],
            'weight' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|numeric|min:0',
            'guarantee' => 'required|boolean',
            'bestseller' => 'required|boolean',
            'new' => 'required|boolean',
//            'categories.*.id' => 'required|numeric|min:1',
        ]), $request->all());
        $product = $this->service->create($request);

        return redirect()->route('admin.shop.products.show', $product);
        try {
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Product $product)
    {
        return view('admin.shop.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.shop.products.edit', compact('product'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        try {
            $product = $this->service->update($product->id, $request);

            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.shop.products.index');
    }
}
