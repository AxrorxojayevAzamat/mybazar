<?php

namespace App\Http\Controllers\Auth;

use App\Entity\User\User;
use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request, $token = null)
    {
        if ($token) {
            if (!$user = User::where('verify_token', $token)->first()) {
                return redirect()->back()->with('error', trans('auth.invalid_auth_token'));
            }
            $emailOrPhone = $user->email;
            $isPhone = false;
        } else {
            $session = Session::get('auth');
            if (!$session || !isset($session['phone_number']) || empty($session['phone_number'])) {
                return redirect()->back()->with('error', trans('auth.phone_not_identified'));
            }
            $emailOrPhone = $session['phone_number'];
            $token = $session['token'];
            $isPhone = true;
        }

        return view('auth.passwords.reset', compact('token', 'emailOrPhone', 'isPhone'));
    }

    protected function rules()
    {
        return [
            'token' => 'required|string',
            'email_or_phone' => 'required|string|max:50',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

//        dd($request->all());
        $emailOrPhone = $request['email_or_phone'];

        $user = User::where(function ($query) use ($emailOrPhone) {
            $query->where('email', $emailOrPhone)
                ->orWhere('phone', trim($emailOrPhone, '+'));
        })->first();

        if (!$user) {
            return redirect('password.reset.request')->with('error', trans('auth.user_not_found'));
        }

        if (!$user->isTokenValid($request['token'])) {
            return redirect()->route('password.reset.request')->with('error', trans('auth.incorrect_verify_token'));
        }

        $this->resetPassword($user, $request['password'], $emailOrPhone);

        Session::remove('auth');

        $this->redirectTo = route('login');

        return redirect()->route('login')->with('success', trans('auth.reset'));
    }

    protected function resetPassword(User $user, string $password, $emailOrPhone)
    {
        $user->setPassword($password);

        if (UserHelper::isEmail($emailOrPhone)) {
            $user->email_verified = true;
        } else if (UserHelper::isPhoneNumber($emailOrPhone)) {
            $user->phone_verified = true;
        }

        $user->setRememberToken(Str::random(60));
        $user->verify_token = null;
        $user->phone_verify_token = null;
        $user->phone_verify_token_expire = null;

        $user->save();

        event(new PasswordReset($user));
    }

    protected function credentials(Request $request)
    {
        $emailOrPhone = $request['email_or_phone'];

        if (UserHelper::isEmail($emailOrPhone)) {
            $username = 'email';
        } elseif (UserHelper::isPhoneNumber($emailOrPhone)) {
            $emailOrPhone = trim($emailOrPhone, '+');
            $username = 'phone';
        } else {
            $username = 'name';
        }

        return [
            $username => $emailOrPhone,
            'password' => $request['password'],
            'password_confirmation' => $request['password_confirmation'],
            'token' => $request['token'],
        ];
    }
}
