<form action="/search-product-filter" class="big-filter-without-title-checkbox" id="shop-filter-form" method="GET">
{{--    {{ $sidebar_is }} type of sidebar --}}
    <input type="hidden" name="search" value="{{ session()->has('search') ? session('search') : '' }}">
    @include('filters.brand-filter')

    @include('filters.category-filter')

    @include('filters.price-filter')
    <input type="submit" id="shop-filter-button" value="{{ trans('frontend.apply_filter') }}">
    <input type="hidden" name="order_by" id="sort-hidden-input">
</form>
