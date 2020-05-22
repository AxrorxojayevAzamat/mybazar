<?php

use App\Entity\Brand;
use App\Entity\Payment;
use App\Entity\Shop\Characteristic;
use App\Entity\Shop\Mark;
use App\Entity\Shop\Modification;
use App\Entity\Shop\Product;
use App\Entity\Store;
use App\Entity\User\User;
use App\Entity\Shop\Category;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;

Breadcrumbs::register('home', function (Crumbs $crumbs) {
    $crumbs->push(trans('adminlte.home'), route('admin.home'));
});

Breadcrumbs::register('login', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('adminlte.sign_in'), route('login'));
});

################################### Admin

Breadcrumbs::register('admin.home', function (Crumbs $crumbs) {
    $crumbs->push(trans('adminlte.home'), route('admin.home'));
});


// Users

Breadcrumbs::register('admin.users.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.users'), route('admin.users.index'));
});

Breadcrumbs::register('admin.users.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.users.index');
    $crumbs->push(trans('adminlte.create'), route('admin.users.create'));
});

Breadcrumbs::register('admin.users.show', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.index');
    $crumbs->push($user->name, route('admin.users.show', $user));
});

Breadcrumbs::register('admin.users.edit', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.show', $user);
    $crumbs->push(trans('adminlte.edit'), route('admin.users.edit', $user));
});


// Categories

Breadcrumbs::register('admin.shop.categories.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.categories'), route('admin.shop.categories.index'));
});

Breadcrumbs::register('admin.shop.categories.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.categories.index');
    $crumbs->push(trans('adminlte.create'), route('admin.shop.categories.create'));
});

Breadcrumbs::register('admin.shop.categories.show', function (Crumbs $crumbs, Category $category) {
    if ($parent = $category->parent) {
        $crumbs->parent('admin.shop.categories.show', $parent);
    } else {
        $crumbs->parent('admin.shop.categories.index');
    }
    $crumbs->push($category->name, route('admin.shop.categories.show', $category));
});

Breadcrumbs::register('admin.shop.categories.edit', function (Crumbs $crumbs, Category $category) {
    $crumbs->parent('admin.shop.categories.show', $category);
    $crumbs->push(trans('adminlte.edit'), route('admin.shop.categories.edit', $category));
});


// Brands

Breadcrumbs::register('admin.brands.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.brands'), route('admin.brands.index'));
});

Breadcrumbs::register('admin.brands.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.brands.index');
    $crumbs->push(trans('adminlte.create'), route('admin.brands.create'));
});

Breadcrumbs::register('admin.brands.show', function (Crumbs $crumbs, Brand $brand) {
    $crumbs->parent('admin.brands.index');
    $crumbs->push($brand->name, route('admin.brands.show', $brand));
});

Breadcrumbs::register('admin.brands.edit', function (Crumbs $crumbs, Brand $brand) {
    $crumbs->parent('admin.brands.show', $brand);
    $crumbs->push(trans('adminlte.edit'), route('admin.brands.edit', $brand));
});


// Marks

Breadcrumbs::register('admin.shop.marks.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.marks'), route('admin.shop.marks.index'));
});

Breadcrumbs::register('admin.shop.marks.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.marks.index');
    $crumbs->push(trans('adminlte.create'), route('admin.shop.marks.create'));
});

Breadcrumbs::register('admin.shop.marks.show', function (Crumbs $crumbs, Mark $mark) {
    $crumbs->parent('admin.shop.marks.index');
    $crumbs->push($mark->name, route('admin.shop.marks.show', $mark));
});

Breadcrumbs::register('admin.shop.marks.edit', function (Crumbs $crumbs, Mark $mark) {
    $crumbs->parent('admin.shop.marks.show', $mark);
    $crumbs->push(trans('adminlte.edit'), route('admin.shop.marks.edit', $mark));
});


// Products

Breadcrumbs::register('admin.shop.products.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.products'), route('admin.shop.products.index'));
});

Breadcrumbs::register('admin.shop.products.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.products.index');
    $crumbs->push(trans('adminlte.create'), route('admin.shop.products.create'));
});

Breadcrumbs::register('admin.shop.products.show', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.shop.products.index');
    $crumbs->push($product->name, route('admin.shop.products.show', $product));
});

Breadcrumbs::register('admin.shop.products.edit', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push(trans('adminlte.edit'), route('admin.shop.products.edit', $product));
});

Breadcrumbs::register('admin.shop.products.reject', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.shop.products.show');
    $crumbs->push($product->name, route('admin.shop.products.reject', $product));
});

Breadcrumbs::register('admin.shop.products.photos', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push(trans('adminlte.photo.add_multiple'), route('admin.shop.products.photos', $product));
});

Breadcrumbs::register('admin.shop.products.main-photo', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push(trans('adminlte.photo.add_main'), route('admin.shop.products.main-photo', $product));
});


// Modifications

Breadcrumbs::register('admin.shop.products.modifications.create', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push(trans('adminlte.create'), route('admin.shop.products.modifications.create', $product));
});

Breadcrumbs::register('admin.shop.products.modifications.show', function (Crumbs $crumbs, Product $product, Modification $modification) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push($modification->name, route('admin.shop.products.modifications.show', ['product' => $product, 'modification' => $modification]));
});

Breadcrumbs::register('admin.shop.products.modifications.edit', function (Crumbs $crumbs, Product $product, Modification $modification) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push(trans('adminlte.edit'), route('admin.shop.products.modifications.edit', ['product' => $product, 'modification' => $modification]));
});


// Values

Breadcrumbs::register('admin.shop.products.values.add', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push(trans('adminlte.create'), route('admin.shop.products.values.add', $product));
});

Breadcrumbs::register('admin.shop.products.values.show', function (Crumbs $crumbs, Product $product, Characteristic $characteristic) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push($characteristic->name, route('admin.shop.products.values.show', ['product' => $product, 'characteristic' => $characteristic]));
});

Breadcrumbs::register('admin.shop.products.values.edit', function (Crumbs $crumbs, Product $product, Characteristic $characteristic) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push(trans('adminlte.edit'), route('admin.shop.products.values.edit', ['product' => $product, 'characteristic' => $characteristic]));
});


// Characteristics

Breadcrumbs::register('admin.shop.characteristics.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.characteristics'), route('admin.shop.characteristics.index'));
});

Breadcrumbs::register('admin.shop.characteristics.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.characteristics.index');
    $crumbs->push(trans('adminlte.create'), route('admin.shop.characteristics.create'));
});

Breadcrumbs::register('admin.shop.characteristics.show', function (Crumbs $crumbs, Characteristic $characteristic) {
    $crumbs->parent('admin.shop.characteristics.index');
    $crumbs->push($characteristic->name, route('admin.shop.characteristics.show', $characteristic));
});

Breadcrumbs::register('admin.shop.characteristics.edit', function (Crumbs $crumbs, Characteristic $characteristic) {
    $crumbs->parent('admin.shop.characteristics.show', $characteristic);
    $crumbs->push(trans('adminlte.edit'), route('admin.shop.characteristics.edit', $characteristic));
});


// Stores

Breadcrumbs::register('admin.stores.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.stores'), route('admin.stores.index'));
});

Breadcrumbs::register('admin.stores.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.stores.index');
    $crumbs->push(trans('adminlte.create'), route('admin.stores.create'));
});

Breadcrumbs::register('admin.stores.show', function (Crumbs $crumbs, Store $store) {
    $crumbs->parent('admin.stores.index');
    $crumbs->push($store->name, route('admin.stores.show', $store));
});

Breadcrumbs::register('admin.stores.edit', function (Crumbs $crumbs, Store $store) {
    $crumbs->parent('admin.stores.show', $store);
    $crumbs->push(trans('adminlte.edit'), route('admin.stores.edit', $store));
});


// Payments

Breadcrumbs::register('admin.payments.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.payments'), route('admin.payments.index'));
});

Breadcrumbs::register('admin.payments.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.payments.index');
    $crumbs->push(trans('adminlte.create'), route('admin.payments.create'));
});

Breadcrumbs::register('admin.payments.show', function (Crumbs $crumbs, Payment $payment) {
    $crumbs->parent('admin.payments.index');
    $crumbs->push($payment->name, route('admin.payments.show', $payment));
});

Breadcrumbs::register('admin.payments.edit', function (Crumbs $crumbs, Payment $payment) {
    $crumbs->parent('admin.payments.show', $payment);
    $crumbs->push(trans('adminlte.edit'), route('admin.payments.edit', $payment));
});


// Store Users

Breadcrumbs::register('admin.stores.users.index', function (Crumbs $crumbs, Store $store) {
    $crumbs->parent('admin.stores.show', $store);
    $crumbs->push(trans('menu.users'), null);
});

Breadcrumbs::register('admin.stores.users.create', function (Crumbs $crumbs, Store $store) {
    $crumbs->parent('admin.stores.users.index', $store);
    $crumbs->push(trans('adminlte.create'), route('admin.stores.users.create', $store));
});

Breadcrumbs::register('admin.stores.users.show', function (Crumbs $crumbs, Store $store, User $user) {
    $crumbs->parent('admin.stores.users.index', $store);
    $crumbs->push($user->name, route('admin.stores.users.show', ['store' => $store, 'user' => $user]));
});

Breadcrumbs::register('admin.stores.users.edit', function (Crumbs $crumbs, Store $store, User $user) {
    $crumbs->parent('admin.stores.users.index', $store);
    $crumbs->push(trans('adminlte.edit'), route('admin.stores.users.edit', ['store' => $store, 'user' => $user]));
});
