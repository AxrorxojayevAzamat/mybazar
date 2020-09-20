@extends('layouts.app')

@section('title', 'Brand view')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/brands.css')}}">
@endsection

@section('body')
    <!-- BRAND View -->
    <section>
        <div class="h4-title brand-view">
            <h4 class="title">Samsung</h4>
        </div>
        <div class="slide-banner">
            <img src="{{asset('images/brand-view-slide-banner.png')}}" alt="">
        </div>

        <div class="outter-brand-view-body">
            <!-- big filter without title checkbox -->
            @include('filters.big-filter-without-title-checkbox')

            <div class="wrapper-filtered-items">
                <nav class=" navbar navbar-expand-custom sort-types">
                    <!--sort-by options  -->
                @include('layouts.sort-by-options')

                <!-- small filter without title checkbox -->
                    @include('filters.small-filter-without-title-checkbox')
                </nav>

                <!-- list mosaic brand items -->
                @include('layouts.list-mosaic-catalog-items', ['products'=>$product])

                <!-- pagination -->
                @include('layouts.pagination')
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('js/autoNumeric-2.0-BETA.js')}}"></script>
    <script src="{{asset('js/autoNumeric.js')}}"></script>


    <script src="{{asset('js/range-slider.js')}}"></script>
    <script src="{{asset('js/1-index.js')}}"></script>
    <script src="{{asset('js/2-catalog-page.js')}}"></script>
@endsection

