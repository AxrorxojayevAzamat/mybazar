@extends('layouts.app')

@section('title', trans('frontend.title.shop_view'))

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/shop.css')}}"> --}}
@endsection

@section('body')
    <div class="h4-title">
        <h4 class="title">{!! $store->name !!}</h4>
    </div>
    <div class="slide-banner">
        <img src="{{ $store->fileOrginal }}" alt="">
    </div>

    @include ('layouts.products-of-day')

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
            <nav class="products-pagination" aria-label="Page navigation example">
                {{ $products->links() }}
            </nav>


        </div>
    </div>
@endsection


@include('shop._scripts')
