<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\VerifyPhoneRequest;
use App\Providers\RouteServiceProvider;
use App\Entity\User\User;
use App\Services\Auth\RegisterService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;
    protected $service;

    protected $redirectTo = '/';

    public function __construct(RegisterService $service)
    {
        $this->service = $service;
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email_or_phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function register(RegisterRequest $request)
    {
        try {
            event(new Registered($user = $this->service->create($request)));

            $this->guard()->login($user);

            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        } catch (\DomainException $e) {
            return redirect('register')->with('error', trans('auth.user_exists'));
        }
    }

    protected function registered(RegisterRequest $request, User $user)
    {
        $this->guard()->logout();

        if ($user->email) {
            return redirect()->route('email.verification');
        } else if ($user->phone) {
            return redirect()->route('phone.verification');
        }
        return redirect('/')->with('error', trans('auth.invalid_params'));
    }

    public function resendEmailShow()
    {
        return view('auth.resend-email');
    }

    public function resendEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:50',
        ]);

        if (!$user = User::where('email', $request['email'])->first()) {
            return redirect()->route('login')->with('error', trans('auth.email_not_identified'));
        }

        $this->service->resendEmail($user->id);

        return redirect()->route('email.verification');
    }

    public function verifyEmail(string $token)
    {
        if (!$user = User::where('verify_token', $token)->first()) {
            return redirect()->route('login')->with('error', trans('auth.link_not_found'));
        }

        $this->service->verifyEmail($user->id);
        try {
            return redirect()->route('login')->with('success', trans('auth.email_verified'));
        } catch (\DomainException $e) {
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }

    public function phone()
    {
        $session = Session::get('auth');
        if (!$session || !$phone = $session['phone_number']) {
            return redirect()->route('register')->with('success', trans('auth.phone_not_found'));
        }

        return view('auth.verify-phone', compact('phone'));
    }

    public function email()
    {
        $session = Session::get('auth');
        if (!$session || !$email = $session['email']) {
            return redirect()->route('register')->with('success', trans('auth.email_not_found'));
        }

        return view('auth.verify-email', compact('email'));
    }

    public function resendPhoneShow(Request $request)
    {
        return view('auth.resend-phone');
    }

    public function resendPhone(Request $request)
    {
        $this->validate($request, [
            'phone' => ['required', 'string', 'regex:/^\+?998[0-9]{9}$/'],
        ]);

        if (!$user = User::where('phone', $request['phone'])->first()) {
            return redirect()->route('login')
                ->with('error', trans('auth.phone_not_identified'));
        }

        $this->service->resendPhone($user->id);

        return redirect()->route('phone.verification');
    }

    public function verifyPhone(VerifyPhoneRequest $request)
    {
        $phone = trim($request->phone,'+');
        if (!$user = User::where('phone', $phone)->first()) {
            return redirect()->route('login')->with('error', trans('auth.phone_not_found'));
        }

        try {
            $this->service->verifyPhone($user->id, $request->token);
            return redirect()->route('login')->with('success', trans('auth.phone_verified'));
        } catch (\DomainException $e) {
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }
}
