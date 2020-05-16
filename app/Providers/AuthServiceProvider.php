<?php

namespace App\Providers;

use App\Entity\User\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-panel', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-shop-categories', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-shop-stores', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-shop-marks', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-shop-brands', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-shop-products', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-shop-characteristics', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-shop-payments', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });
    }
}
