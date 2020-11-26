<?php

namespace App\Providers;

use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Entity\User\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
            // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot() {
        $this->registerPolicies();

        Gate::define('admin-panel', function (User $user) {
            return $user->isAdmin() || $user->isModerator() || $user->isManager();
        });

        Gate::define('manage-users', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-categories', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-stores', function (User $user) {
            return $user->isAdmin() || $user->isModerator() || $user->isManager();
        });

        Gate::define('show-own-store', function (User $user, Store $store) {
            return $user->isAdmin() || $user->isModerator() || $user->storeWorker()->where('store_id', $store->id)->exists();
        });

        Gate::define('edit-own-store', function (User $user, Store $store) {
            return $user->isAdmin() || $user->storeWorker()->where('store_id', $store->id)->exists();
        });

        Gate::define('alter-stores-status', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-store-users', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-shop-marks', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-brands', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-shop-products', function (User $user) {
            return $user->isAdmin() || $user->isModerator() || $user->isManager();
        });

        Gate::define('show-own-product', function (User $user, Product $product) {
            return $user->isAdmin() || $user->isModerator() || in_array($product->store_id, $user->storeWorker()->pluck('store_id')->toArray());
        });

        Gate::define('edit-own-product', function (User $user, Product $product) {
            return $user->isAdmin() || in_array($product->store_id, $user->storeWorker()->pluck('store_id')->toArray());
        });

        Gate::define('close-own-product', function (User $user, Product $product) {
            return $user->isAdmin() || $user->isModerator() || in_array($product->store_id, $user->storeWorker()->pluck('id')->toArray());
        });

        Gate::define('alter-products-status', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-shop-characteristics', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-payments', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-deliveries', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-orders', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-carts', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-blog-categories', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-blog-posts', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-blog-news', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-blog-videos', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-banners', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-sliders', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-discounts', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('manage-profile', function (User $user) {
            return $user->isUser() || $user->isManager();
        });

        Gate::define('manage-pages', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });

        Gate::define('moderate-characteristics', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });
    }

}
