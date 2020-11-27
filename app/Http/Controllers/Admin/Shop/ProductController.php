<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Discount;
use App\Entity\Shop\Mark;
use App\Entity\Shop\Photo;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductCategory;
use App\Entity\Shop\ShopDiscounts;
use App\Entity\Shop\ShopProductDiscounts;
use App\Entity\Store;
use App\Entity\StoreUser;
use App\Helpers\LanguageHelper;
use App\Helpers\ProductHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Products\CreateRequest;
use App\Http\Requests\Admin\Shop\Products\UpdateRequest;
use App\Services\Manage\Shop\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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

        $storeIds = [];
        if (Auth::user()->isManager()) {
            $storeIds = StoreUser::where('user_id', Auth::id())->pluck('store_id')->toArray();
        }

        if (!empty($value = $request->get('name'))) {
            $query->where(function ($query) use ($value) {
                $query->where('name_uz', 'ilike', '%' . $value . '%')
                    ->orWhere('name_ru', 'ilike', '%' . $value . '%')
                    ->orWhere('name_en', 'ilike', '%' . $value . '%');
            });
        }

        if (!empty($value = $request->get('store_id'))) {
            $query->where('store_id', $value);
            $storeIds = array_intersect($storeIds, [$value]);
        }

        empty($storeIds) ? : $query->whereIn('store_id', $storeIds);

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

        $categories = ProductHelper::getCategoryList();
        $stores = Store::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $brands = Brand::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.products.index', compact('products', 'categories', 'stores', 'brands'));
    }

    public function create(Store $store)
    {
        if ($store) {
            $discounts = ProductHelper::getDiscounts($store->id);
        } else {
            $discounts = [];
            $store = null;
        }
        $categories = ProductHelper::getCategoryList();
        $brands = Brand::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $marks = Mark::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $stores = Store::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.products.create', compact('categories', 'store', 'stores', 'brands', 'marks', 'discounts'));
    }

    public function store(CreateRequest $request)
    {
        try {
            $product = $this->service->create($request);
            session()->flash('message', 'запись обновлён ');
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            session()->flash('error', 'Произошла ошибка');
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Product $product)
    {
        if (!Gate::allows('show-own-product', $product)) {
            abort(404);
        }
        $productDiscounts= ShopProductDiscounts::where(['product_id'=>$product->id])->pluck('discount_id');
        $discounts = Discount::whereIn('id', $productDiscounts)->get();
        return view('admin.shop.products.show', compact('product','discounts'));
    }

    public function edit(Product $product)
    {
        $store = $product->store;
        if (!Gate::allows('edit-own-product', $product)) {
            abort(404);
        }
        if ($store) {
            $discounts = ProductHelper::getDiscounts($store->id);
        } else {
            $discounts = [];
            $store = null;
        }
        $categories = ProductHelper::getCategoryList();
        $stores = Store::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $brands = Brand::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $marks = Mark::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.shop.products.edit', compact('product', 'categories', 'stores', 'brands', 'marks','store','discounts'));
    }

    public function update(UpdateRequest $request, Product $product)
    {

        if (!Gate::allows('edit-own-product', $product)) {
            abort(404);
        }

        try {
            $product = $this->service->update($product->id, $request);
            session()->flash('message', 'запись обновлён ');
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            session()->flash('error', 'Произошла ошибка');
            return back()->with('error', $e->getMessage());
        }
    }

    public function sendToModeration(Product $product)
    {
        $this->service->sendToModeration($product->id);
        try {
            session()->flash('message', 'запись обновлён ');
            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            session()->flash('error', 'Произошла ошибка');
            return back()->with('error', $e->getMessage());
        }
    }

    public function moderate(Product $product)
    {
        if (!Gate::allows('alter-products-status')) {
            abort(404);
        }

        try {
            $this->service->moderate($product->id);

            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function activate(Product $product)
    {
        if (!Gate::allows('alter-products-status')) {
            abort(404);
        }

        try {
            $this->service->activate($product->id);
            session()->flash('message', 'запись обновлён');

            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            session()->flash('error', 'Произошла ошибка');
            return back()->with('error', $e->getMessage());
        }
    }

    public function draft(Product $product)
    {
        if (!Gate::allows('alter-products-status')) {
            abort(404);
        }

        try {
            $this->service->draft($product->id);
            session()->flash('message', 'запись обновлён ');

            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            session()->flash('error', 'Произошла ошибка');
            return back()->with('error', $e->getMessage());
        }
    }

    public function close(Product $product)
    {
        if (!Gate::allows('close-own-product', $product)) {
            abort(404);
        }

        try {
            $this->service->close($product->id);
            session()->flash('message', 'запись обновлён ');

            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            session()->flash('error', 'Произошла ошибка');
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        if (!Gate::allows('edit-own-product', $product)) {
            abort(404);
        }

        $product->delete();
        session()->flash('message', 'запись обновлён ');
        return redirect()->route('admin.shop.products.index');
    }

    public function mainPhoto(Product $product)
    {
        return view('admin.shop.products.main-photo', compact('product'));
    }

    public function photos(Product $product)
    {
        return view('admin.shop.products.photos', compact('product'));
    }

    public function addMainPhoto(Product $product, Request $request)
    {
        try {
            $this->validate($request, ['photo' => 'required|image|mimes:jpg,jpeg,png']);

            $this->service->addMainPhoto($product->id, $request->photo);

            return redirect()->route('admin.shop.products.show', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function removeMainPhoto(Product $product)
    {
        if (!Gate::allows('edit-own-product', $product)) {
            abort(404);
        }

        try {
            $this->service->removeMainPhoto($product->id);
            return response()->json('The main photo is successfully deleted!');
        } catch (\Exception $e) {
            return response()->json('The main photo is not deleted!', 400);
        }

    }

    public function addPhoto(Product $product, Request $request)
    {
        try {
            $this->validate($request, ['photo' => 'required|image|mimes:jpg,jpeg,png']);

            $this->service->addPhoto($product->id, $request->photo);

            return redirect()->route('admin.shop.products.photos', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function removePhoto(Product $product, Photo $photo)
    {
        try {
            $this->service->removePhoto($product->id, $photo->id);
            return redirect()->route('admin.shop.products.photos', $product);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function movePhotoUp(Product $product, Photo $photo)
    {
        try {
            $this->service->movePhotoUp($product->id, $photo->id);
            return back();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function movePhotoDown(Product $product, Photo $photo)
    {
        try {
            $this->service->movePhotoDown($product->id, $photo->id);
            return back();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
