<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\NetworkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class NetworkController extends Controller
{
    private $service;

    public function __construct(NetworkService $service)
    {
        $this->service = $service;
    }

    public function redirect(string $network)
    {
//        dd(Socialite::driver($network));

        return Socialite::driver($network)->redirect();
    }

    public function callback(string $network)
    {
        $data = Socialite::driver($network)->user();

        try {
            if (!Auth::user()) {
                $user = $this->service->auth($network, $data);
                Auth::login($user);
            } else {
                $user = $this->service->attach($network, $data);
            }
            return redirect()->intended();
        } catch (\DomainException $e) {
            if (Auth::user()) {
                return redirect()->route('user.profile')->with('error', $e->getMessage());
            }
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }
}
