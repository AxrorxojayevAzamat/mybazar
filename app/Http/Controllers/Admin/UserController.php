<?php

namespace App\Http\Controllers\Admin;

use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    public function index(Request $request)
    {
        $query = User::orderByDesc('id');

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('email'))) {
            $query->where('email', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }

        if (!empty($value = $request->get('role'))) {
            $query->where('role', $value);
        }

        $users = $query->paginate(20);

        $statuses = User::statusesList();

        $roles = User::rolesList();

        return view('admin.users.index', compact('users', 'statuses', 'roles'));
    }

    public function create()
    {
        $roles = User::rolesList();

        return view('admin.users.create', compact('roles'));
    }

    public function store(CreateRequest $request)
    {
        $user = User::new($request['name'], $request['email'], $request['role'], $request['password']);

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

        return view('admin.users.edit', compact('user', 'statuses', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->edit($request->name, $request->email, $request->role, $request->status, $request->password);

        return redirect()->route('admin.users.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}