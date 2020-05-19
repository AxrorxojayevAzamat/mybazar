<?php

namespace App\Http\Controllers\Admin\Store;

use App\Entity\Store;
use App\Entity\StoreUser;
use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stores\Users\CreateRequest;
use App\Http\Requests\Admin\Stores\Users\UpdateRequest;
use App\Services\StoreService;

class UserController extends Controller
{
    private $service;

    public function __construct(StoreService $service)
    {
        $this->middleware('can:manage-shop-stores');
        $this->service = $service;
    }

    public function create(Store $store)
    {
        $roles = StoreUser::rolesList();

        return view('admin.stores.users.create', compact('store', 'roles'));
    }

    public function store(CreateRequest $request, Store $store)
    {
        $storeWorker = $this->service->addWorker($store->id, $request);

        return redirect()->route('admin.stores.users.show', ['store' => $store, 'user' => $storeWorker->user]);
    }

    public function show(Store $store, User $user)
    {
        $storeWorker = $store->storeWorkers()->where('user_id', $user->id)->firstOrFail();
        return view('admin.stores.users.show', compact('store', 'user', 'storeWorker'));
    }

    public function edit(Store $store)
    {
        $roles = StoreUser::rolesList();
        $statuses = User::statusesList();

        return view('admin.stores.users.edit', compact('store', 'roles', 'statuses'));
    }

    public function update(UpdateRequest $request, Store $store)
    {
        $store = $this->service->update($store->id, $request);

        return redirect()->route('admin.stores.users.show', $store);
    }

    public function destroy(Store $store, User $user)
    {
        $store->storeWorkers()->where('user_id', $user->id)->delete();

        return redirect()->route('admin.stores.show', $store);
    }
}
