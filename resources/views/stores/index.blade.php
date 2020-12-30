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
    <div class="outter-list-of-shops">
        <form action="get" class="accordion big-filter filter" id="catalogFilter">
            <div class="filter-item">
                @include('filters.category-filter', ['parentCategory' => null, 'rootCategoryShow' => false])
            </div>
        </form>
{{--        <ul class="list-group">--}}
{{--            @foreach($categories as $category)--}}
{{--                <li class="list-group-item"><a href="?category_id={{ $category->id }}">{!! $category->name !!}</a></li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
        <div class="wrapper-filtered-items">
            <form id="search-bar" class="w-100 search-bar form-control" method="get">
                <div class="input-with-tags">
                    <input id="search-input" class="main-search-bordered-input" type="text" placeholder="{{ trans('frontend.breadcrumb.search') }}" name="shopName">
                </div>
                <button class="search btn" type="submit"><i class="mbsearch"></i></button>
            </form>
            <nav class=" navbar navbar-expand-custom sort-types">
                @include('layouts.small-filter-without-title-checkbox')
            </nav>

        @include('stores.storesList')

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
