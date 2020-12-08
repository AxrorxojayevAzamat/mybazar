@extends('layouts.admin.page')

@section('title', trans('frontend.title.dashboard'))

{{--@section('content_header')--}}
{{--    <h1>Dashboard</h1>--}}
{{--@stop--}}

@section('breadcrumbs', '')


@section('content')
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">Dashboard</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    You are logged in!--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<div class="row justify-content-start">
    <div class="col-md-4">
        <div class="card bg-danger">
            <div class="card-header">
                <div class="row">
                    <div>
                        <img src={{asset('images/icons8-categorize-40.png')}} alt="">
                    </div>
                    <h3 class="text-center w-75">Категории</h3>
                </div>
            </div>
            <div class="card-body">
                Количество категорий: <b> {{$categoryCount}}</b>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success">
            <div class="card-header">
                <div class="row">
                    <div>
                        <img src={{asset('images/icons8-b-40.png')}} alt="">
                    </div>
                    <h3 class="text-center w-75">Бренды</h3>
                </div>
            </div>
            <div class="card-body">
                Количество брендов: <b> {{$brandCount}}</b>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-start">
    <div class="col-md-4">
        <div class="card bg-primary">
            <div class="card-header">
                <div class="row">
                    <div>
                        <img src={{asset('images/icons8-online-store-40.png')}} alt="">
                    </div>
                    <h3 class="text-center w-75">Mагазины</h3>
                </div>
            </div>
            <div class="card-body">
                Количество магазинов: <b> {{$storesCount}}</b>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-info">
            <div class="card-header">
                <div class="row">
                    <div>
                        <img src={{asset('images/icons8-used-product-40.png')}} alt="">
                    </div>
                    <h3 class="text-center w-75">Продукты</h3>
                </div>
            </div>
            <div class="card-body">
                Количество товаров: {{$productsCount}}
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-start">
    <div class="col-md-4">
        <div class="card bg-warning">
            <div class="card-header">
                <div class="row">
                    <div>
                        <img src={{asset('images/icons8-manager-40.png')}} alt="">
                    </div>
                    <h3 class="text-center w-75">Менеджеры</h3>
                </div>
            </div>
            <div class="card-body">
                Количество менеджеров: <b> {{$managerCount}}</b> 
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-dark">
            <div class="card-header">
                <div class="row">
                    <div>
                        <img src={{asset('images/icons8-people-40.png')}} alt="">
                    </div>
                    <h3 class="text-center w-75">Пользователи</h3>
                </div>
            </div>
            <div class="card-body">
                Количество пользователей: <b> {{$userCount}}</b>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-start">
    <div class="col-md-4">
        <div class="card bg-secondary">
            <div class="card-header">
                <div class="row">
                    <div>
                        <img src={{asset('images/icons8-banner-40.png')}} alt="">
                    </div>
                    <h3 class="text-center w-75">Баннеры</h3>
                </div>
            </div>
            <div class="card-body">
                Количество баннеров: <b> {{$bannerCount}}</b>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-start">
    <div class="col-md-4">
        <div class="card bg-light">
            <div class="card-header">
                <div class="row">
                    <div>
                        <img src={{asset('images/icons8-order-history-40.png')}} alt="">
                    </div>
                    <h3 class="text-center w-75">Заказы</h3>
                </div>
            </div>
            <div class="card-body">
                Количество заказов: <b> {{$orderCount}}</b>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
