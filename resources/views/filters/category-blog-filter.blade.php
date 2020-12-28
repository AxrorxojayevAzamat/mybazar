@if (isset($categories) || $parentCategory)
    <button type="button" class="btn accordion active category-btn">@lang('frontend.breadcrumb.categories')</button>
    <div id="filter2" class="panel">

        <div class="custom-control custom-checkbox">
            <ul>
                @if(isset($parentCategory) and !$parentCategory->isEmpty())
                    @foreach($parentCategory as $i => $category)

                        <li class="category-list">
                            <a href="?categoryName={{ $category->id }}"><b>{{ $category->name }}</b></a>
                        </li>
                    @endforeach
                @elseif(isset($rootCategoryShow))
                    <li class="category-list">
                        <a href="?categoryName=all"><b>@lang('menu.whole_catalog')</b></a>
                    </li>
                @endif
                @if(isset($categories))
                    @foreach($categories as $i => $category)
                        <li class="category-list">
                            <a href="?categoryName={{ $category->id }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <input type="hidden" name="brands" id="brands-hidden-input">
@endif


