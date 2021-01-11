@if (isset($categories) || $parentCategory)
    <button type="button" class="btn accordion_filter active category-btn">@lang('frontend.breadcrumb.categories')</button>
    <div id="filter2" class="panel">

        <div class="custom-control custom-checkbox">
            <ul>
                @if(isset($parentCategory) && $parentCategory)
                    @foreach($parentCategory as $i => $category)
                        <li class="category-list">
                            <a href="{{ route('categories.show', products_path($category)) }}"><b>{{ $category->name }}</b></a>
                        </li>
                    @endforeach
                @elseif(isset($rootCategoryShow) && $rootCategoryShow)
                    <li class="category-list">
                        <a href="/categories"><b>@lang('menu.whole_catalog')</b></a>
                    </li>
                @endif
{{--                {{dd($categories)}}--}}
                @if(isset($categories))
                    @foreach($categories as $i => $category)
                        <li class="category-list">
                            <a href="{{ route('categories.show', products_path($category)) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <input type="hidden" name="brands" id="brands-hidden-input">
@endif
