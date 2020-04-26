<?php

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

// Users
Breadcrumbs::register('admin.home', function (Crumbs $crumbs) {
    $crumbs->push(trans('adminlte.home'), route('admin.home'));
});

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

