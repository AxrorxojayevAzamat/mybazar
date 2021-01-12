<form action="/search-product-filter" class="big-filter-without-title-checkbox" id="shop-filter-form" method="GET">
{{--    {{ $sidebar_is }} type of sidebar --}}
    <input type="hidden" name="search" value="{{ session()->has('search') ? session('search') : '' }}">
    @if($sidebar_is != 'Brands')
        @include('filters.brand-filter')

    @endif

    @include('filters.category-filter')

    @if($sidebar_is != 'Brands')
        @include('filters.price-filter')
    @endif
    <input type="submit" id="catalog-filter-button" value="{{ trans('frontend.apply_filter') }}">
    <input type="hidden" name="order_by" id="sort-hidden-input">
</form>
