@extends('layouts.app')

@section('title', trans('frontend.title.shops_page'))

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/shop.css')}}"> --}}
@endsection

@section('body')

    @section('banner')
        <!-- Slide banner -->
        @include ('layouts.slide-banner-catalog')
    @endsection

    <!-- SHOPS body  -->
    <section>
        <div class="h4-title shops-body">
            <h4 class="title">@lang('frontend.stores')</h4>
        </div>
        <div class="outter-list-of-shops">
            <form action="#" class="big-filter-with-listof-checkbox" id="shop-index-filter-form">
                @if ($categories->isNotEmpty())
                    @php($categoriesSlugs = explode(',', request('categories')))
                    @foreach($categories as $i => $category)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input categories-checkbox" id="categories-checkbox-{{ $i }}"
                                   value="{{ $category->slug }}" @if (in_array($category->slug, $categoriesSlugs)) checked @endif >
                            <label  class="custom-control-label" for="categories-checkbox-{{ $i }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
                    <input type="hidden" name="categories" id="categories-hidden-input">
                @endif

                <input type="submit" id="shop-index-filter-button" value="{{ trans('frontend.apply_filter') }}">
            </form>

            <div class="wrapper-filtered-items">
                <nav class=" navbar navbar-expand-custom sort-types">
                    <!--sort-by options  -->
                    @include('layouts.sort-by-options')

                    <!-- small filter without title checkbox -->
                    @include('layouts.small-filter-without-title-checkbox')
                </nav>

                <!-- list mosaic catalog items -->
            @include('shop.shops-items')

            <!-- pagination -->

            </div>
        </div>
    </section>

    <!-- recently viewed -->
    @include('layouts.recently-viewed')
@endsection

@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
    <script src="{{asset('js/3-popular-page.js')}}"></script>

    <script>
        let filterButton = $('#shop-index-filter-button');
        let filterForm = $('#shop-index-filter-form');

        $(document).ready(function () {
            filterButton.click(function (e) {
                e.preventDefault();

                let categories = getFilter('categories-checkbox');
                let categoriesInput = $('#categories-hidden-input');

                categoriesInput.val(categories);
                filterForm.submit();
            });
        });

        function getFilter(className) {
            let filter = '';
            $('.' + className + ':checked').each(function() {
                filter += $(this).val() + ',';
                // filter.push($(this).val());
            });
            return filter.slice(0, -1);
        }
    </script>
@endsection
