<?php


namespace App\Services\Auth;


use App\Entity\User\Network;
use App\Entity\User\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Contracts\User as NetworkUser;

class NetworkService
{

    public function auth(string $network, NetworkUser $data): User
    {
        if ($user = User::byNetwork($network, $data->getId())->first()) {
            return $user;
        }


        if ($data->getEmail() && $user = User::where('email', $data->getEmail())->first()) {
            $user->attachNetwork($network, $data->getId(), $data->getEmail());
            return $user;
        }

        $user = DB::transaction(function () use ($data, $network) {
            return User::registerByNetwork($network, $data->getId(), $data->getEmail());
        });

        event(new Registered($user));

        return $user;
    }

    public function attach(string $network, NetworkUser $data): User
    {
        $user = Auth::user();

        if (Network::where('network', $network)->where('identity', $data->getId())->exists()) {
            throw new \DomainException('Network is already used!');
        }

        if ($data->getEmail() && $user = User::where('email', $data->getEmail())->first() && $user->email !== $data->getEmail()) {
            throw new \DomainException('Network is already used!');
        }

        if ($user->networks()->where('network', $network)->exists()) {
            throw new \DomainException('Network is already attached!');
        }

        $user->attachNetwork($network, $data->getId(), $data->getEmail());

        return $user;
    }
}
