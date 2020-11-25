<?php

namespace App\Http\Controllers\Admin;

use App\Entity\User\User;
use App\Entity\User\Profile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use Illuminate\Http\Request;
use App\Services\User\UserService;

class UserController extends Controller
{

    private $service;

    public function __construct(UserService $service)
    {
        $this->middleware('can:manage-users');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $users = $this->service->findUsers($request)->paginate(20);

        $statuses = User::statusesList();
        $roles = User::rolesList();

        return view('admin.users.index', compact('users', 'statuses', 'roles'));
    }

    public function requestsIndex(Request $request)
    {
        $users = $this->service->findUsersRequested($request)->paginate(20);

        $statuses = User::statusesList();

        return view('admin.users.requests-index', compact('users', 'statuses'));
    }

    public function create()
    {
        $roles = User::rolesList();
        $genders = Profile::gendersList();

        return view('admin.users.create', compact('roles', 'genders'));
    }

    public function store(CreateRequest $request)
    {
        $user = $this->service->store($request);

        return redirect()->route('admin.users.show', $user);
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user', 'roles'));
    }

    public function edit(User $user)
    {
        $roles = User::rolesList();
        $statuses = User::statusesList();
        $genders = Profile::gendersList();

        return view('admin.users.edit', compact('user', 'statuses', 'roles', 'genders'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user = $this->service->update($user->id, $request);

        return redirect()->route('admin.users.show', $user);
    }

    public function approveManagerRoleRequest(Request $request, User $user)
    {
        $this->service->approveManagerRoleRequest($user->id);

        return redirect()->route('admin.users.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }

}
