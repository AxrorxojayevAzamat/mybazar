<?php

use App\Entity\Banner;
use App\Entity\Page;
use App\Entity\Shop\CharacteristicGroup;
use App\Entity\Slider;
use App\Http\Router\PagePath;
use App\Http\Router\ProductsPath;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;
use App\Entity\Brand;
use App\Entity\DeliveryMethod;
use App\Entity\Payment;
use App\Entity\Shop\Cart;
use App\Entity\Shop\Characteristic;
use App\Entity\Shop\Mark;
use App\Entity\Shop\Modification;
use App\Entity\Shop\Order;
use App\Entity\Shop\OrderItem;
use App\Entity\Shop\Product;
use App\Entity\Shop\ProductReview;
use App\Entity\Store;
use App\Entity\User\User;
use App\Entity\Category;
use App\Entity\Blog\Post;
use App\Entity\Blog\Video;
use App\Entity\Discount;

Breadcrumbs::register('home', function (Crumbs $crumbs) {
    $crumbs->push(trans('adminlte.home'), route('admin.home'));
});

Breadcrumbs::register('login', function (Crumbs $crumbs) {
});

Breadcrumbs::register('password.request', function (Crumbs $crumbs) {
});

Breadcrumbs::register('password.reset', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('auth.reset_password'), route('password.reset'));
});

Breadcrumbs::register('password.reset.email', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('auth.reset_password_email'), route('password.reset.email'));
});

Breadcrumbs::register('register', function (Crumbs $crumbs) {
});

Breadcrumbs::register('email.verification', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('auth.email_verification'), route('email.verification'));
});

Breadcrumbs::register('phone.verification', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('auth.phone_verification'), route('phone.verification'));
});

Breadcrumbs::register('front-home', function (Crumbs $crumbs) {
    $crumbs->push(trans('frontend.breadcrumb.home'), route('front-home'));
});

Breadcrumbs::register('auth', function (Crumbs $crumbs) {
    $crumbs->push(trans('frontend.breadcrumb.auth'), route('auth'));
});

Breadcrumbs::register('mail', function (Crumbs $crumbs) {
    $crumbs->push(trans('frontend.breadcrumb.mail'), route('mail'));
});

Breadcrumbs::register('sms', function (Crumbs $crumbs) {
    $crumbs->push(trans('frontend.breadcrumb.sms'), route('sms'));
});

Breadcrumbs::register('blogs', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('frontend.breadcrumb.blogs'), route('blogs'));
});

Breadcrumbs::register('search', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('frontend.breadcrumb.search'), route('search'));
});

Breadcrumbs::register('search-product-filter', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('frontend.breadcrumb.search'), route('search-product-filter'));
});

Breadcrumbs::register('blogs.show', function (Crumbs $crumbs, Post $post) {
    $crumbs->parent('blogs');
    $crumbs->push($post->title, route('blogs.show', $post));
});

Breadcrumbs::register('brands', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('frontend.breadcrumb.brands'), route('brands'));
});

Breadcrumbs::register('brands.show', function (Crumbs $crumbs, Brand $brand) {
    $crumbs->parent('brands');
    $crumbs->push($brand->name, route('brands.show', $brand));
});

Breadcrumbs::register('cart', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push(trans('frontend.breadcrumb.cart'), route('cart'));
});

Breadcrumbs::register('checkout', function (Crumbs $crumbs) {
    $crumbs->parent('cart');
    $crumbs->push(trans('frontend.breadcrumb.checkout'), route('checkout'));
});

Breadcrumbs::register('pay', function (Crumbs $crumbs) {
    $crumbs->parent('checkout');
    $crumbs->push(trans('frontend.breadcrumb.delivery'), route('pay'));
});

Breadcrumbs::register('catalog.list', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push('Весь каталог', route('catalog.list'));
});

Breadcrumbs::register('catalogsection', function (Crumbs $crumbs) {
    $crumbs->parent('catalog.list');
    $crumbs->push('Телевизоры, аудио и видео', route('catalogsection'));
});

Breadcrumbs::register('categories.index', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push(trans('frontend.breadcrumb.categories'), route('categories.index'));
});

//Breadcrumbs::register('categories.show', function (Crumbs $crumbs, Category $category) {
//    $crumbs->parent('front-home');
//    $crumbs->push($category->name, route('categories.show', $category));
//});

Breadcrumbs::register('delivery', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push(trans('frontend.breadcrumb.delivery'), route('delivery'));
});

Breadcrumbs::register('popular', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push(trans('frontend.breadcrumb.popular'), route('popular'));
});

// User
Breadcrumbs::register('user.setting', function (Crumbs $crumbs) {
});

Breadcrumbs::register('user.favorites', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push(trans('frontend.breadcrumb.favorites'), route('user.favorites'));
});

// Categories
Breadcrumbs::register('categories.inner_category', function (Crumbs $crumbs, ProductsPath $path, ProductsPath $orig) {
    if ($path->category && $parent = $path->category->parent) {
        $crumbs->parent('categories.inner_category', $path->withCategory($parent), $orig);
    } else {
        $crumbs->parent('front-home');
        $crumbs->push(trans('menu.products'), route('categories.show'));
    }
    if ($path->category) {
        $crumbs->push($path->category->name, route('categories.show', products_path($path->category)));
    }
});

Breadcrumbs::register('categories.show', function (Crumbs $crumbs, ProductsPath $path = null) {
    $path = $path ?: products_path(null);
    $crumbs->parent('categories.inner_category', $path, $path);
});


// Pages
Breadcrumbs::register('page', function (Crumbs $crumbs, PagePath $path) {
    if ($parent = $path->page->parent) {
        $crumbs->parent('page', $path->withPage($path->page->parent));
    } else {
        $crumbs->parent('home');
    }
    $crumbs->push($path->page->title, route('page', $path));
});


// Products
Breadcrumbs::register('products.show', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('categories.show', products_path($product->mainCategory));
    $crumbs->push($product->name, route('products.show', $product));
});

Breadcrumbs::register('products.compare', function (Crumbs $crumbs, Product $product, Product $comparingProduct) {
    $crumbs->parent('products.show', $product);
    $crumbs->push(trans('frontend.compare_products'), route('products.compare', ['product' => $product, 'comparingProduct' => $comparingProduct]));
});

Breadcrumbs::register('products.newest', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push(trans('frontend.breadcrumb.newest'), route('products.newest'));
});

Breadcrumbs::register('discounts.index', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push(trans('frontend.breadcrumb.discounts'), route('discounts.index'));
});

Breadcrumbs::register('discounts.show', function (Crumbs $crumbs, Discount $discount) {
    $crumbs->parent('discounts.index');
    $crumbs->push($discount->name, route('discounts.show', $discount));
});

Breadcrumbs::register('shops.index', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push(trans('frontend.breadcrumb.shops'), route('shops.index'));
});

Breadcrumbs::register('shops.show', function (Crumbs $crumbs, Store $store) {
    $crumbs->parent('shops.index');
    $crumbs->push($store->name, route('shops.show', $store));
});

Breadcrumbs::register('videos.index', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push(trans('frontend.breadcrumb.videos'), route('videos.index'));
});

Breadcrumbs::register('videos.show', function (Crumbs $crumbs, Video $video) {
    $crumbs->parent('videos.index');
    $crumbs->push($video->title, route('videos.show', $video));
});

Breadcrumbs::register('stores.index', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push(trans('frontend.stores.index'), route('stores.index'));
});

Breadcrumbs::register('stores.show', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push(trans('frontend.stores.index'), route('stores.index'));
});

Breadcrumbs::register('stores.view', function (Crumbs $crumbs) {
    $crumbs->parent('stores.index');
    $crumbs->push(trans('frontend.stores.index'), route('stores.index'));
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

Breadcrumbs::register('admin.categories.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.categories'), route('admin.categories.index'));
});

Breadcrumbs::register('admin.categories.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.categories.index');
    $crumbs->push(trans('adminlte.create'), route('admin.categories.create'));
});

Breadcrumbs::register('admin.categories.show', function (Crumbs $crumbs, Category $category) {
    if ($parent = $category->parent) {
        $crumbs->parent('admin.categories.show', $parent);
    } else {
        $crumbs->parent('admin.categories.index');
    }
    $crumbs->push($category->name, route('admin.categories.show', $category));
});

Breadcrumbs::register('admin.categories.edit', function (Crumbs $crumbs, Category $category) {
    $crumbs->parent('admin.categories.show', $category);
    $crumbs->push(trans('adminlte.edit'), route('admin.categories.edit', $category));
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
Breadcrumbs::register('admin.shop.store', function (Crumbs $crumbs) {
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


// Product reviews

Breadcrumbs::register('admin.shop.products.reviews.index', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push(trans('menu.products'), route('admin.shop.products.reviews.index', $product));
});

Breadcrumbs::register('admin.shop.products.reviews.show', function (Crumbs $crumbs, Product $product, ProductReview $review) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push($review->id, route('admin.shop.products.reviews.show', ['product' => $product, 'review' => $review]));
});


// Characteristic groups

Breadcrumbs::register('admin.shop.characteristic-groups.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.characteristic-groups'), route('admin.shop.characteristic-groups.index'));
});

Breadcrumbs::register('admin.shop.characteristic-groups.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.characteristic-groups.index');
    $crumbs->push(trans('adminlte.create'), route('admin.shop.characteristic-groups.create'));
});

Breadcrumbs::register('admin.shop.characteristic-groups.show', function (Crumbs $crumbs, CharacteristicGroup $group) {
    $crumbs->parent('admin.shop.characteristic-groups.index');
    $crumbs->push($group->name, route('admin.shop.characteristic-groups.show', $group));
});

Breadcrumbs::register('admin.shop.characteristic-groups.edit', function (Crumbs $crumbs, CharacteristicGroup $group) {
    $crumbs->parent('admin.shop.characteristic-groups.show', $group);
    $crumbs->push(trans('adminlte.edit'), route('admin.shop.characteristic-groups.edit', $group));
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


// Delivery methods

Breadcrumbs::register('admin.deliveries.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.delivery_methods'), route('admin.deliveries.index'));
});

Breadcrumbs::register('admin.deliveries.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.deliveries.index');
    $crumbs->push(trans('adminlte.create'), route('admin.deliveries.create'));
});

Breadcrumbs::register('admin.deliveries.show', function (Crumbs $crumbs, DeliveryMethod $delivery) {
    $crumbs->parent('admin.deliveries.index');
    $crumbs->push($delivery->name, route('admin.deliveries.show', $delivery));
});

Breadcrumbs::register('admin.deliveries.edit', function (Crumbs $crumbs, DeliveryMethod $delivery) {
    $crumbs->parent('admin.deliveries.show', $delivery);
    $crumbs->push(trans('adminlte.edit'), route('admin.deliveries.edit', $delivery));
});


// Carts

Breadcrumbs::register('admin.shop.carts.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.carts'), route('admin.shop.carts.index'));
});

Breadcrumbs::register('admin.shop.carts.show', function (Crumbs $crumbs, Cart $cart) {
    $crumbs->parent('admin.shop.carts.index');
    $crumbs->push($cart->id, route('admin.shop.carts.show', $cart));
});


// Orders

Breadcrumbs::register('admin.shop.orders.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.orders'), route('admin.shop.orders.index'));
});

Breadcrumbs::register('admin.shop.orders.show', function (Crumbs $crumbs, Order $order) {
    $crumbs->parent('admin.shop.orders.index');
    $crumbs->push($order->id, route('admin.shop.orders.show', $order));
});

Breadcrumbs::register('admin.shop.orders.item', function (Crumbs $crumbs, Order $order, OrderItem $item) {
    $crumbs->parent('admin.shop.orders.show', $order);
    $crumbs->push($order->id, route('admin.shop.orders.item', ['order' => $order, 'item' => $item]));
});

// Posts

Breadcrumbs::register('admin.blog.posts.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Posts', route('admin.blog.posts.index'));
});

Breadcrumbs::register('admin.blog.posts.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.blog.posts.index');
    $crumbs->push(trans('adminlte.create'), route('admin.blog.posts.create'));
});

Breadcrumbs::register('admin.blog.posts.show', function (Crumbs $crumbs, Post $post) {
    $crumbs->parent('admin.blog.posts.index');
    $crumbs->push($post->title_ru, route('admin.blog.posts.show', $post));
});

Breadcrumbs::register('admin.blog.posts.edit', function (Crumbs $crumbs, Post $post) {
    $crumbs->parent('admin.blog.posts.show', $post);
    $crumbs->push(trans('adminlte.edit'), route('admin.blog.posts.edit', $post));
});


// Videos

Breadcrumbs::register('admin.blog.videos.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Videos', route('admin.blog.videos.index'));
});

Breadcrumbs::register('admin.blog.videos.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.blog.videos.index');
    $crumbs->push(trans('adminlte.create'), route('admin.blog.videos.create'));
});

Breadcrumbs::register('admin.blog.videos.show', function (Crumbs $crumbs, Video $video) {
    $crumbs->parent('admin.blog.videos.index');
    $crumbs->push($video->title_ru, route('admin.blog.videos.show', $video));
});

Breadcrumbs::register('admin.blog.videos.edit', function (Crumbs $crumbs, Video $video) {
    $crumbs->parent('admin.blog.videos.show', $video);
    $crumbs->push(trans('adminlte.edit'), route('admin.blog.videos.edit', $video));
});

// Banners
Breadcrumbs::register('admin.banners.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Banners', route('admin.banners.index'));
});

Breadcrumbs::register('admin.banners.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.banners.index');
    $crumbs->push(trans('adminlte.create'), route('admin.banners.create'));
});

Breadcrumbs::register('admin.banners.show', function (Crumbs $crumbs, Banner $banners) {
    $crumbs->parent('admin.banners.index');
    $crumbs->push($banners->title_ru, route('admin.banners.show', $banners));
});

Breadcrumbs::register('admin.banners.edit', function (Crumbs $crumbs, Banner $banner) {
    $crumbs->parent('admin.banners.show', $banner);
    $crumbs->push(trans('adminlte.edit'), route('admin.banners.edit', $banner));
});

// Pages

Breadcrumbs::register('admin.pages.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Pages', route('admin.pages.index'));
});

Breadcrumbs::register('admin.pages.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.pages.index');
    $crumbs->push(trans('adminlte.create'), route('admin.pages.create'));
});

Breadcrumbs::register('admin.pages.show', function (Crumbs $crumbs, Page $page) {
    if ($parent = $page->parent) {
        $crumbs->parent('admin.pages.show', $parent);
    } else {
        $crumbs->parent('admin.pages.index');
    }
    $crumbs->push($page->title, route('admin.pages.show', $page));
});

Breadcrumbs::register('admin.pages.edit', function (Crumbs $crumbs, Page $page) {
    $crumbs->parent('admin.pages.show', $page);
    $crumbs->push(trans('adminlte.edit'), route('admin.pages.edit', $page));
});


// Sliders
Breadcrumbs::register('admin.sliders.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Sliders', route('admin.sliders.index'));
});

Breadcrumbs::register('admin.sliders.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.sliders.index');
    $crumbs->push(trans('adminlte.create'), route('admin.sliders.create'));
});

Breadcrumbs::register('admin.sliders.show', function (Crumbs $crumbs, Slider $sliders) {
    $crumbs->parent('admin.sliders.index');
    $crumbs->push($sliders->id, route('admin.sliders.show', $sliders));
});

Breadcrumbs::register('admin.sliders.edit', function (Crumbs $crumbs, Slider $sliders) {
    $crumbs->parent('admin.sliders.show', $sliders);
    $crumbs->push(trans('adminlte.edit'), route('admin.sliders.edit', $sliders));
});

// Discounts
Breadcrumbs::register('admin.discounts.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.discounts'), route('admin.discounts.index'));
});

Breadcrumbs::register('admin.discounts.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.discounts.index');
    $crumbs->push(trans('adminlte.create'), route('admin.discounts.create'));
});

Breadcrumbs::register('admin.discounts.show', function (Crumbs $crumbs, Discount $discounts) {
    $crumbs->parent('admin.discounts.index');
    $crumbs->push($discounts->id, route('admin.discounts.show', $discounts));
});

Breadcrumbs::register('admin.discounts.edit', function (Crumbs $crumbs, Discount $discounts) {
    $crumbs->parent('admin.discounts.show', $discounts);
    $crumbs->push(trans('adminlte.edit'), route('admin.discounts.edit', $discounts));
});



