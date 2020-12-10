@if (isset($categories))
    <button type="button" class="btn accordion active category-btn">@lang('frontend.breadcrumb.categories')</button>
    <div id="filter2" class="panel">

        <div class="custom-control custom-checkbox">
            <ul>
            @foreach($categories as $i => $category)
               <li class="category-list">
                <a href="?category={{$category->id}}">{{ $category->name }}</a>
               </li>
            @endforeach
            </ul>
        </div>
    </div>
    <input type="hidden" name="brands" id="brands-hidden-input">
@endif
