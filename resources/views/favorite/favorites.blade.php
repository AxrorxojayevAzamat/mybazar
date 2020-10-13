@extends('layouts.app')

@section('title', 'Favorites page')

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/favorites.css')}}"> --}}
@endsection

@section('body')
    <!-- favorities VIEW -->
    <section>
        <div class="h4-title catalog-view">
            <h4 class="title">Избранные товары</h4>
        </div>
        <div class="outter-catalog-view">
            <!-- big filter without title checkbox -->
            @include('filters.big-filter-with-title-checkbox')

            <div class="wrapper-filtered-items">

                <nav class=" navbar navbar-expand-custom sort-types">

                    <!--sort-by options  -->
                @include('layouts.sort-by-options')

                <!-- small filter without title checkbox -->
                    @include('filters.small-filter-without-title-checkbox')
                </nav>

                <!-- list mosaic catalog items -->
            @include('favorite.favorite-items')

            <!-- pagination -->

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('js/1-index.js')}}"></script>
    <script src="{{asset('js/2-catalog-page.js')}}"></script>
@endsection
