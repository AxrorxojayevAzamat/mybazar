<?php

namespace App\Http\Controllers\Admin\Store;

use App\Entity\Payment;
use App\Entity\Shop\Mark;
use App\Entity\Store;
use App\Entity\StoreCategory;
use App\Helpers\LanguageHelper;
use App\Helpers\ProductHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stores\CreateRequest;
use App\Http\Requests\Admin\Stores\UpdateRequest;
use App\Services\Manage\StoreService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $service;

    public function __construct(StoreService $service)
    {
        $this->middleware('can:manage-shop-stores');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Store::orderByDesc('updated_at');

        if (!empty($value = $request->get('name'))) {
            $query->where(function ($query) use ($value) {
                $query->where('name_uz', 'ilike', '%' . $value . '%')
                    ->orWhere('name_ru', 'ilike', '%' . $value . '%')
                    ->orWhere('name_en', 'ilike', '%' . $value . '%');
            });
        }

        if (!empty($value = $request->get('category_id'))) {
            $products = StoreCategory::where('category_id', $value)->pluck('store_id')->toArray();
            $query->whereIn('id', $products);
        }

        $stores = $query->paginate(20);

        $categories = ProductHelper::getCategoryList();

        return view('admin.stores.index', compact('stores', 'categories'));
    }

    public function create()
    {
        $categories = ProductHelper::getCategoryList();
        $marks = Mark::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $payments = Payment::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.stores.create', compact('categories', 'marks', 'payments'));
    }

    public function store(CreateRequest $request)
    {
        $store = $this->service->create($request);

        return redirect()->route('admin.stores.show', $store);
    }

    public function show(Store $store)
    {
        return view('admin.stores.show', compact('store'));
    }

    public function edit(Store $store)
    {
        $categories = ProductHelper::getCategoryList();
        $marks = Mark::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $payments = Payment::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        return view('admin.stores.edit', compact('store', 'categories', 'marks', 'payments'));
    }

    public function update(UpdateRequest $request, Store $store)
    {
        $store = $this->service->update($store->id, $request);

        return redirect()->route('admin.stores.show', $store);
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('admin.stores.index');
    }

    public function removeLogo(Store $store)
    {
        if ($this->service->removeLogo($store->id)) {
            return response()->json('The logo is successfully deleted!');
        }
        return response()->json('The logo is not deleted!', 400);
    }
}
