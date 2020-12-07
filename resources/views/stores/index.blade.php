@extends('layouts.app')
@section('title')
    {{ trans('frontend.breadcrumb.shops') }}
@endsection
@section('body')
@section('banner')
    <!-- Slide banner -->
    @include ('layouts.slide-banner-catalog')
@endsection


<section>
    <div class="h4-title shops-body">
        <h4 class="title">{{ trans('frontend.breadcrumb.shops') }}</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <form id="search-bar" class="search-bar form-control" method="get">
                <div class="input-with-tags">
                    <input id="search-input" class="main-search-bordered-input" type="text" placeholder="{{ trans('frontend.breadcrumb.search') }}" name="shopName">
                </div>
                <button class="search btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="outter-list-of-shops">
        @include('stores.categories')
        <div class="wrapper-filtered-items">
            <nav class=" navbar navbar-expand-custom sort-types">
                <!--sort-by options  -->
            @include('layouts.sort-by-options')

            <!-- small filter without title checkbox -->
                @include('layouts.small-filter-without-title-checkbox')
            </nav>

            <!-- list mosaic catalog items -->
        @include('stores.storesList')

        <!-- pagination -->

        </div>
    </div>
</section>
<nav class="products-pagination" aria-label="Page navigation example">
    <ul class="pagination">
        {!! $stores->links() !!}
    </ul>
</nav>
@include ('layouts.carousel-products',
        ['products' => $recentProducts, "title" => trans('frontend.product.you_watched'), 'rate_for' => ['js' => '"V"', 'html' => 'V']])
@endsection


