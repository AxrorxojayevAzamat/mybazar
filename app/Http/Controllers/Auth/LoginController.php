<?php

namespace App\Http\Controllers\Auth;

use App\Entity\User\User;
use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    private $isEmail = false;
    private $isPhone = false;

    public function __construct()
    {
        session(['url.intended' => url()->previous()]);
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        $authenticate = $this->attemptLogin($request);

        if ($authenticate) {
            if (Auth::user()->isAdmin() || Auth::user()->isManager()) {
                session(['url.intended' => route('admin.home')]);
                $this->redirectTo = route('admin.home');
            }
//            if (Auth::user()->isUser()) {
//                session(['url.intended' => url()->previous()]);
//                $this->redirectTo = url()->previous();
//            }

            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request)
    {
        $emailOrPhone = $request['email_or_phone'];

        if (UserHelper::isEmail($emailOrPhone)) {
            $username = 'email';
            $this->isEmail = true;
        } elseif (UserHelper::isPhoneNumber($emailOrPhone)) {
            $emailOrPhone = trim($emailOrPhone, '+');
            $username = 'phone';
            $this->isPhone = true;
        } else {
            $username = 'name';
        }

        return [
            $username => $emailOrPhone,
            'password' => $request['password'],
        ];
    }

    public function authenticated(Request $request, User $user)
    {
        if ($user->isWait()) {
            $this->guard()->logout();

            if ($this->isEmail && $user->verify_token) {
                return back()->with('error', trans('auth.need_to_confirm_email'));
            } elseif ($this->isPhone) {
                return back()->with('error', trans('auth.verify_your_phone'));
            }

            return back()->with('error', trans('auth.account_not_verified'));
        } else if ($user->isActive()) {
            if ($this->isEmail && !$user->email_verified && !($user->isAdmin() || $user->isModerator())) {
                return back()->with('error', trans('auth.email_not_verified'));
            } else if ($this->isPhone && !$user->phone_verified && !($user->isAdmin() || $user->isModerator())) {
                return back()->with('error', trans('auth.phone_not_verified'));

            }
        }
//        if ($user->isPhoneAuthEnabled()) {
//            Auth::logout();
//            $token = (string)random_int(10000, 99999);
//            $request->session()->put('auth', [
//                'id' => $user->id,
//                'token' => $token,
//                'remember' => $request->filled('remember'),
//            ]);
//            $this->sms->send($user->phone, 'Login code: ' . $token);
//            return redirect()->route('login.phone');
//        }

        return redirect()->intended($this->redirectPath());
    }

    public function username()
    {
        return 'email_or_phone';
    }

    public function phone()
    {
        return view('auth.verify-phone');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function verify(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        $this->validate($request, [
            'token' => 'required|string',
        ]);

        if (!$session = $request->session()->get('auth')) {
            throw new BadRequestHttpException(trans('auth.missing_token'));
        }

        /** @var User $user */
        $user = User::findOrFail($session['id']);

        if ($request['token'] === $session['token']) {
            $request->session()->flush();
            $this->clearLoginAttempts($request);
            Auth::login($user, $session['remember']);
            return redirect()->intended(route('cabinet.home'));
        }

        $this->incrementLoginAttempts($request);

        throw ValidationException::withMessages(['token' => [trans('auth.invalid_auth_token')]]);
    }
}
