@extends('layouts.app')

@section('title', trans('frontend.title.shop_view'))

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/shop.css')}}"> --}}
@endsection

@section('body')
@section('banner')
    <!-- Slide Banner shop-view -->
    @include('layouts.slide-banner-shop-view')
@endsection
<!-- PRODUCT OF DAY -->
@include ('layouts.products-of-day')

    <!--SHOPS VIEW -->
    <section>
        <div class="h4-title catalog-view">
            <h4 class="title">Телевизоры</h4>
        </div>
        <div class="outter-catalog-view">
            <!-- big filter without title checkbox -->
            @include('shop.big-filter-without-title-checkbox')

            <div class="wrapper-filtered-items">
                <nav class=" navbar navbar-expand-custom sort-types">
                    <!--sort-by options  -->
                    @include('layouts.sort-by-options')

                    <!-- small filter without title checkbox -->
                    @include('layouts.small-filter-without-title-checkbox')
                </nav>

                <!-- list mosaic catalog items -->
                @include('layouts.products-list-grid', ['products' => $products])

                <!-- pagination -->
                @include('layouts.pagination')

            </div>
        </div>
    </section>
@endsection


@include('shop._scripts')
