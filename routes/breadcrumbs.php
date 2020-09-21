<?php

use App\Entity\Banner;
use App\Entity\Slider;
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
use App\Entity\Shop\Category as ShopCategory;
use App\Entity\Blog\Category as BlogCategory;
use App\Entity\Blog\News;
use App\Entity\Blog\Post;
use App\Entity\Blog\Video;

Breadcrumbs::register('home', function (Crumbs $crumbs) {
    $crumbs->push(trans('adminlte.home'), route('admin.home'));
});

Breadcrumbs::register('login', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('adminlte.sign_in'), route('login'));
});

Breadcrumbs::register('front-home', function (Crumbs $crumbs) {
    $crumbs->push('Главная', route('front-home'));
});

Breadcrumbs::register('auth', function (Crumbs $crumbs) {
    $crumbs->push('Вход или регистрация', route('auth'));
});

Breadcrumbs::register('mail', function (Crumbs $crumbs) {
    $crumbs->push('Вход или регистрация', route('mail'));
});

Breadcrumbs::register('sms', function (Crumbs $crumbs) {
    $crumbs->push('Вход или регистрация', route('sms'));
});

Breadcrumbs::register('blogs-news', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Блог и новости', route('blogs-news'));
});

Breadcrumbs::register('blogs.show', function (Crumbs $crumbs, Post $post) {
    $crumbs->parent('blogs-news');
    $crumbs->push($post->title, route('blogs.show', $post));
});

Breadcrumbs::register('news.show', function (Crumbs $crumbs, News $news) {
    $crumbs->parent('blogs-news');
    $crumbs->push($news->title, route('news.show', $news));
});

Breadcrumbs::register('brands', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Все бренды', route('brands'));
});

Breadcrumbs::register('brands.show', function (Crumbs $crumbs,Brand $brand) {
    $crumbs->parent('brands');
    $crumbs->push($brand->name, route('brands.show',$brand));
});

Breadcrumbs::register('cart', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push('Корзина', route('cart'));
});

Breadcrumbs::register('checkout', function (Crumbs $crumbs) {
    $crumbs->parent('cart');
    $crumbs->push('Оформление заказа', route('checkout'));
});

Breadcrumbs::register('pay', function (Crumbs $crumbs) {
    $crumbs->parent('checkout');
    $crumbs->push('Способ оплаты', route('pay'));
});

Breadcrumbs::register('catalog', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push('Весь каталог', route('catalog'));
});

Breadcrumbs::register('catalogsection', function (Crumbs $crumbs) {
    $crumbs->parent('catalog');
    $crumbs->push('Телевизоры, аудио и видео', route('catalogsection'));
});

Breadcrumbs::register('category.index', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push('Категория', route('category.index'));
});

Breadcrumbs::register('compare', function (Crumbs $crumbs) {
    $crumbs->parent('compare');
    $crumbs->push('Сравнение', route('compare'));
});

Breadcrumbs::register('delivery', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push('Способы доставки', route('delivery'));
});

Breadcrumbs::register('favorites', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push('Избранное', route('favorites'));
});

Breadcrumbs::register('popular', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push('Избранное', route('popular'));
});

Breadcrumbs::register('productviewpage', function (Crumbs $crumbs) {
    $crumbs->parent('catalog');
    $crumbs->push('Смартфоны и гаджеты * Все смартфоны * Xiaomi * Смартфон Redmi Note 9S (Interstellar Grey)', route('productviewpage'));
});

Breadcrumbs::register('sales', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push('Акции и скидки', route('sales'));
});

Breadcrumbs::register('sales.show', function (Crumbs $crumbs) {
    $crumbs->parent('sales');
    $crumbs->push('Черная пятница от магазина Xiaomi Samarqand Darvoza', route('sales.show'));
});

Breadcrumbs::register('salesview', function (Crumbs $crumbs) {
    $crumbs->parent('sales');
    $crumbs->push('Черная пятница от магазина Xiaomi Samarqand Darvoza', route('salesview'));
});

Breadcrumbs::register('shops', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push('Магазины', route('shops'));
});

Breadcrumbs::register('shopsview', function (Crumbs $crumbs) {
    $crumbs->parent('shops');
    $crumbs->push('Телевизоры, аудио и видео * Artel Qoratosh" MChJ', route('shopsview'));
});

Breadcrumbs::register('videos.index', function (Crumbs $crumbs) {
    $crumbs->parent('front-home');
    $crumbs->push('Видеоролики', route('videos.index'));
});

Breadcrumbs::register('videos.show', function (Crumbs $crumbs,Video $video) {
    $crumbs->parent('videos.index');
    $crumbs->push($video->title, route('videos.show',$video));
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
    $crumbs->push(trans('menu.shop_categories'), route('admin.shop.categories.index'));
});

Breadcrumbs::register('admin.shop.categories.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.shop.categories.index');
    $crumbs->push(trans('adminlte.create'), route('admin.shop.categories.create'));
});

Breadcrumbs::register('admin.shop.categories.show', function (Crumbs $crumbs, ShopCategory $category) {
    if ($parent = $category->parent) {
        $crumbs->parent('admin.shop.categories.show', $parent);
    } else {
        $crumbs->parent('admin.shop.categories.index');
    }
    $crumbs->push($category->name, route('admin.shop.categories.show', $category));
});

Breadcrumbs::register('admin.shop.categories.edit', function (Crumbs $crumbs, ShopCategory $category) {
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


// Product reviews

Breadcrumbs::register('admin.shop.products.reviews.index', function (Crumbs $crumbs, Product $product) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push(trans('menu.products'), route('admin.shop.products.reviews.index', $product));
});

Breadcrumbs::register('admin.shop.products.reviews.show', function (Crumbs $crumbs, Product $product, ProductReview $review) {
    $crumbs->parent('admin.shop.products.show', $product);
    $crumbs->push($review->id, route('admin.shop.products.reviews.show', ['product' => $product, 'review' => $review]));
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

// Categories
Breadcrumbs::register('admin.blog.categories.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('menu.blog_categories'), route('admin.blog.categories.index'));
});

Breadcrumbs::register('admin.blog.categories.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.blog.categories.index');
    $crumbs->push(trans('adminlte.create'), route('admin.blog.categories.create'));
});

Breadcrumbs::register('admin.blog.categories.show', function (Crumbs $crumbs, BlogCategory $category) {
    $crumbs->parent('admin.blog.categories.index');
    $crumbs->push('sa', route('admin.blog.categories.show', $category));
});

Breadcrumbs::register('admin.blog.categories.edit', function (Crumbs $crumbs, BlogCategory $category) {
    $crumbs->parent('admin.home', $category);
    $crumbs->push(trans('adminlte.edit'), route('admin.blog.categories.edit', $category));
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



// News
Breadcrumbs::register('admin.blog.news.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('News', route('admin.blog.news.index'));
});

Breadcrumbs::register('admin.blog.news.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.blog.news.index');
    $crumbs->push(trans('adminlte.create'), route('admin.blog.news.create'));
});

Breadcrumbs::register('admin.blog.news.show', function (Crumbs $crumbs, News $news) {
    $crumbs->parent('admin.blog.news.index');
    $crumbs->push($news->title_ru, route('admin.blog.news.show', $news));
});

Breadcrumbs::register('admin.blog.news.edit', function (Crumbs $crumbs, News $news) {
    $crumbs->parent('admin.blog.news.show', $news);
    $crumbs->push(trans('adminlte.edit'), route('admin.blog.news.edit', $news));
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
