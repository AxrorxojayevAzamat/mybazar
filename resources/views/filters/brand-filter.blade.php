@if (isset($brandFilter))
    @php($brandSlugs = explode(',', request('brands')))
    <button type="button" class="btn accordion active">@lang('frontend.brand')</button>
    <div id="filter2" class="panel">
        @foreach($brandFilter as $i => $brand)
            <div class="custom-control custom-checkbox">
                <input type="checkbox"  class="custom-control-input brands-checkbox" name="brands" id="brands-checkbox-{{ $i }}"
                       value="{{ $brand['id'] }}">
                <label class="custom-control-label" for="brands-checkbox-{{ $i }}">{{ $brand['name'] }}</label>
            </div>
        @endforeach
        <a class="show-more" href="#">@lang('frontend.show_more')</a>
    </div>
    <input type="hidden" name="brands" id="brands-hidden-input">
@endif
