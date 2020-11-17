@extends('layouts.app')

@section('title', 'Popular page')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/jquery.rateyo.css')}}">
@endsection

@section('body')
    @section('banner')
        <!-- Slide banner -->
        @include ('layouts.slide-banner-catalog')
    @endsection

    <!-- POPULAR NEW RECOMMENDED BUTTONS -->
    <div class="new-popular-recommended-btn">
        <button class="btn active">Популярные</button>
        <button class="btn">Новинки</button>
        <button class="btn">Рекомендуемые</button>
    </div>

    <!-- POPULAR VIEW  -->
    <section>
        <div class="outter-catalog-view">
            <!-- big filter without title checkbox -->
            @include('filters.big-filter-with-title-checkbox')

            <div class="wrapper-filtered-items">
                <nav class=" navbar navbar-expand-custom sort-types">
                    <!--sort-by options  -->
                    @include('layouts.sort-by-options')

                    <!-- small filter without title checkbox -->
                    @include('filters.small-filter-with-title-checkbox')
                </nav>

                <!-- list mosaic catalog items -->
                @include('layouts.products-list-grid')

                <!-- pagination -->
                @include('layouts.pagination')
            </div>
        </div>
    </section>

    <div class="h4-title">
        <h4 class="title">Магазины</h4>
    </div>
    <!-- SHOPS 1 -->
    <section class="popular-shops">
        @include('shop.shops1')
    </section>

    <!-- FULL BANNER 1 -->
    @include ('layouts.full-banner1')

    <!-- SHOPS 2 -->
    <section class="popular-shops">
        @include('shop.shops2')
    </section>

    <!-- SHOPS 2 -->
    <section class="popular-shops last">
        @include('shop.shops2')
    </section>
@endsection

@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script src="{{mix('js/2-catalog-page.js', 'build')}}"></script>
    <script src="{{asset('js/jquery.rateyo.js')}}"></script>
@endsection
