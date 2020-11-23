@if (isset($categories))
    <button type="button" class="btn accordion active">@lang('frontend.breadcrumb.categories')</button>
    <div id="filter2" class="panel">
        @foreach($categories as $i => $category)
            <div  class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input brands-checkbox" id="brands-checkbox-{{ $i }}"
                       value="{{ $category['id'] }}">
                <label class="custom-control-label" for="brands-checkbox-{{ $i }}">{{ $category['name'] }}</label>
            </div>
        @endforeach
        <a class="show-more" href="#">Показать еще</a>
    </div>
    <input type="hidden" name="brands" id="brands-hidden-input">
@endif
