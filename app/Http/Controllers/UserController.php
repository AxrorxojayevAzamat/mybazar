<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Entity\User\Profile;
use App\Entity\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageHelper;

class UserController extends Controller
{

    public function index() {
        $user = Auth::user();

        return view('user.index', compact('user'));
    }

    public function edit(User $user) {
        $genders = Profile::gendersList();

        return view('user.edit', compact('user', 'genders'));
    }

    public function update(Request $request, User $user) {
        

        if (!$request->avatar) {
            $user->profile->edit($request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address);
        } else {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_PROFILES . '/' . $user->id);

            $imageName = ImageHelper::getRandomName($request->avatar);
            $user->profile->edit($request->first_name, $request->last_name, $request->birth_date, $request->gender, $request->address, $imageName);

            $this->uploadPoster($user->id, $request->avatar, $imageName);
        }

        return redirect()->route('user.profile', $user);
    }

}
