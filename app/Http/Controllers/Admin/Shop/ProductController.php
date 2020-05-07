<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductCategory;
use App\Entity\Store;
use App\Helpers\LanguageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Products\CreateRequest;
use App\Http\Requests\Admin\Shop\Products\UpdateRequest;
use App\Services\Shop\ProductService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        $query = Product::orderByDesc('updated_at');

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('store_id'))) {
            $query->where('store_id', $value);
        }

        if (!empty($value = $request->get('brand_id'))) {
            $query->where('brand_id', $value);
        }

        if (!empty($value = $request->get('category_id'))) {
            $products = ProductCategory::where('category_id', $value)->pluck('product_id')->toArray();
            $query->whereIn('id', $products);
        }

        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }

        $products = $query->paginate(20);

        $categories = $this->service->getCategoryList();
        $stores = Store::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $brands = Brand::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.products.index', compact('products', 'categories', 'stores', 'brands'));
    }

    public function create()
    {
        $categories = $this->service->getCategoryList();
        $stores = Store::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $brands = Brand::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.products.create', compact('categories', 'stores', 'brands'));
    }

    public function store(CreateRequest $request)
    {
        try {
            $product = $this->service->create($request);

            return redirect()->route('admin.shop.products.show', $product);
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
        $categories = $this->service->getCategoryList();
        $stores = Store::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $brands = Brand::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.products.edit', compact('product', 'categories', 'stores', 'brands'));
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

    public function addMainPhoto(Product $product, Request $request)
    {
        try {
            $this->validate($request, ['image' => 'required|image|mimes:jpg,jpeg,png']);



        } catch (ValidationException $e) {

        } catch (\Exception $e) {

        }

    }

    public function addPhotos(Product $product, Request $request)
    {
        try {
            $this->validate($request, ['image' => 'required|image|mimes:jpg,jpeg,png']);



        } catch (ValidationException $e) {

        } catch (\Exception $e) {

        }

    }
}
