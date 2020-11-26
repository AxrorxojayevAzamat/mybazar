<?php

namespace App\Http\Controllers\Admin\Store;

use App\Entity\Store;
use App\Entity\StoreUser;
use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Stores\Users\CreateRequest;
use App\Http\Requests\Admin\Stores\Users\UpdateRequest;
use App\Services\Manage\StoreService;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    private $service;

    public function __construct(StoreService $service)
    {
        $this->middleware('can:manage-store-users');
        $this->service = $service;
    }

    public function create(Store $store)
    {
//        if (Gate::allows('manage-store-users')) {
//            abort(403);
//        }

        $roles = StoreUser::rolesList();

        return view('admin.stores.users.create', compact('store', 'roles'));
    }

    public function add(CreateRequest $request, Store $store)
    {
        $storeWorker = $this->service->addWorker($store->id, $request);

        return redirect()->route('admin.stores.users.show', ['store' => $store, 'user' => $storeWorker->user]);
    }

    public function show(Store $store, User $user)
    {
        $storeWorker = $store->storeWorkers()->where('user_id', $user->id)->firstOrFail();
        return view('admin.stores.users.show', compact('store', 'user', 'storeWorker'));
    }

    public function edit(Store $store, User $user)
    {
        $storeWorker = $store->storeWorkers()->where('user_id', $user->id)->firstOrFail();
        $roles = StoreUser::rolesList();
        $statuses = User::statusesList();

        return view('admin.stores.users.edit', compact('store', 'user', 'storeWorker', 'roles', 'statuses'));
    }

    public function update(UpdateRequest $request, Store $store, User $user)
    {
        $this->service->updateWorker($store->id, $user->id, $request);

        return redirect()->route('admin.stores.users.show', ['store' => $store, 'user' => $user]);
    }

    public function destroy(Store $store, User $user)
    {
        $store->storeWorkers()->where('user_id', $user->id)->delete();

        return redirect()->route('admin.stores.show', $store);
    }
}
