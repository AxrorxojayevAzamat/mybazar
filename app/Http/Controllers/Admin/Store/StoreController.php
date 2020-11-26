<?php

namespace App\Http\Controllers\Admin\Store;

use App\Entity\DeliveryMethod;
use App\Entity\Discount;
use App\Entity\Payment;
use App\Entity\Shop\Mark;
use App\Entity\Store;
use App\Entity\StoreCategory;
use App\Entity\StoreUser;
use App\Helpers\LanguageHelper;
use App\Helpers\ProductHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stores\CreateRequest;
use App\Http\Requests\Admin\Stores\UpdateRequest;
use App\Services\Manage\StoreService;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class StoreController extends Controller
{
    private $service;

    public function __construct(StoreService $service)
    {
        $this->middleware('can:manage-stores');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Store::orderByDesc('updated_at');

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

        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }

        if (!empty($value = $request->get('category_id'))) {
            $storeIds = array_intersect($storeIds, StoreCategory::where('category_id', $value)->pluck('store_id')->toArray());
        }

        empty($storeIds) ? : $query->whereIn('id', $storeIds);

        $stores = $query->paginate(20);

        $categories = ProductHelper::getCategoryList();

        return view('admin.stores.index', compact('stores', 'categories'));
    }

    public function create()
    {
        $categories = ProductHelper::getCategoryList();
        $discounts = Discount::orderByDesc('created_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $marks = Mark::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $payments = Payment::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $deliveryMethods = DeliveryMethod::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.stores.create', compact('categories', 'marks', 'payments', 'deliveryMethods','discounts'));
    }

    public function show(Store $store)
    {
        return view('admin.stores.show', compact('store'));
    }

    public function store(CreateRequest $request)
    {
        $store = $this->service->create($request);
        session()->flash('message', 'zapiz dobavlen');  // TODO: translate

        return redirect()->route('admin.stores.show', 'store');
    }

    public function edit(Store $store)
    {
        $categories = ProductHelper::getCategoryList();
        $marks = Mark::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $payments = Payment::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $discounts = Discount::orderByDesc('created_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $deliveryMethods = DeliveryMethod::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.stores.edit', compact('store', 'categories', 'marks', 'payments', 'deliveryMethods','discounts'));
    }

    public function update(UpdateRequest $request, Store $store)
    {
        $store = $this->service->update($store->id, $request);
        session()->flash('message', 'Запись добавлена');

        return redirect()->route('admin.stores.show', $store);
    }

    public function moderate(Store $store)
    {
        try {
            $this->service->moderate($store->id);

            return redirect()->route('admin.stores.show', $store);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function draft(Store $store)
    {
        try {
            $this->service->draft($store->id);

            return redirect()->route('admin.stores.show', $store);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Store $store)
    {
        $store->delete();
        session()->flash('message', 'Запись добавлена');

        return redirect()->route('admin.stores.index');
    }

    public function removeLogo(Store $store)
    {
        if ($this->service->removeLogo($store->id)) {
            return response()->json('The logo is successfully deleted!');
        }
        return response()->json('The logo is not deleted!', 400);
    }

    public function moveDeliveryToFirst(Store $store, DeliveryMethod $deliveryMethod)
    {
        try {
            $this->service->moveDeliveryMethodToFirst($store->id, $deliveryMethod->id);
            return redirect()->route('admin.stores.show', $store);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function moveDeliveryUp(Store $store, DeliveryMethod $deliveryMethod)
    {
        try {
            $this->service->moveDeliveryMethodUp($store->id, $deliveryMethod->id);
            return redirect()->route('admin.stores.show', $store);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function moveDeliveryDown(Store $store, DeliveryMethod $deliveryMethod)
    {
        try {
            $this->service->moveDeliveryMethodDown($store->id, $deliveryMethod->id);
            return redirect()->route('admin.stores.show', $store);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function moveDeliveryToLast(Store $store, DeliveryMethod $deliveryMethod)
    {
        try {
            $this->service->moveDeliveryMethodToLast($store->id, $deliveryMethod->id);
            return redirect()->route('admin.stores.show', $store);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
