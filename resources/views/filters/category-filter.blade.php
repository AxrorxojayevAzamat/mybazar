@if (isset($categories))
    <button type="button" class="btn accordion active">@lang('frontend.breadcrumb.categories')</button>
    <div id="filter2" class="panel">

        <div class="custom-control custom-checkbox">
            @foreach($categories as $i => $category)
                <a href="#">{{ $category['name'] }}</a>
            @endforeach
        </div>
    </div>
    <input type="hidden" name="brands" id="brands-hidden-input">
@endif
