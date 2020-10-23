<?php

namespace App\Http\Controllers\Admin;

use App\Entity\User\User;
use App\Entity\User\Profile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Http\Requests\Admin\Users\Profile\CreateProfileRequest;
use App\Http\Requests\Admin\Users\Profile\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Helpers\ImageHelper;
use Illuminate\Http\UploadedFile;

class UserController extends Controller
    {

    public function __construct()
    {
        $this->middleware('can:manage-users');
    }

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
        $roles   = User::rolesList();
        $genders = Profile::gendersList();

        return view('admin.users.create', compact('roles', 'genders'));
    }

    public function store(CreateRequest $request)
    {
        $user = User::new($request['name'], $request['email'], $request['role'], $request['password']);
        if ($this->isProfile($request)) {
            $imageName = null;
            if ($request->avatar) {
                $imageName = ImageHelper::getRandomName($request->avatar);
                $this->uploadAvatar($user->id, $request->avatar, $imageName);
            }
            Profile::new($user->d, $request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address, $imageName);
        }
        return redirect()->route('admin.users.show', $user);
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user', 'roles'));
    }

    public function edit(User $user)
    {
        $roles    = User::rolesList();
        $statuses = User::statusesList();
        $genders  = Profile::gendersList();

        return view('admin.users.edit', compact('user', 'statuses', 'roles', 'genders'));
    }

    public function update(UpdateRequest $request, User $user)
    {

        $user->edit($request->name, $request->email, $request->role, $request->status, $request->password);
        if ($user->profile) {

            if (!$request->avatar) {
                $user->profile->edit($request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address);
            } else {
                Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_PROFILES . '/' . $user->id);

                $imageName = ImageHelper::getRandomName($request->avatar);
                $user->profile->edit($user->id, $request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address, $imageName);

                $this->uploadPoster($user->id, $request->avatar, $imageName);
            }
        } else {
            $imageName = null;
            if ($request->avatar) {
                $imageName = ImageHelper::getRandomName($request->avatar);
                $this->uploadAvatar($user->id, $request->avatar, $imageName);
            }
            Profile::new($user->id, $request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address, $imageName);
        }


        return redirect()->route('admin.users.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    public function isProfile(CreateRequest $request): bool
    {
        $count = 0;
        $request['first_name'] ? $count++ : 0;
        $request['last_name'] ? $count++ : 0;
        $request['birth_date'] ? $count++ : 0;
        $request['gender'] != Profile::GENDER_EMPTY ? $count++ : 0;
        $request['address'] ? $count++ : 0;
        $request['avatar'] ? $count++ : 0;
        return $count;
    }

    private function uploadAvatar(int $userId, UploadedFile $file, string $imageName): void
    {
        ImageHelper::saveThumbnail($userId, ImageHelper::FOLDER_PROFILES, $file, $imageName);
        ImageHelper::saveOriginal($userId, ImageHelper::FOLDER_PROFILES, $file, $imageName);
    }

    }
