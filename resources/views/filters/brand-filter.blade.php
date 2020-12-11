@if (isset($brandFilter))
    <button type="button" class="btn accordion active">@lang('frontend.brand')</button>
    <div id="filter1" class="panel">
        @foreach($brandFilter as $i => $brand)
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="brands[]" class="custom-control-input brands-checkbox" id="brands-checkbox-{{ $i }}"
                       value="{{ $brand->id }}" @if (request('brands') !== null and in_array($brand->id, request('brands'))) checked @endif>
                <label class="custom-control-label" for="brands-checkbox-{{ $i }}">{{ $brand->name }}</label>
            </div>
        @endforeach
            <a class="show-more" href="#">@lang('frontend.show_more')</a>
    </div>
    <input type="hidden" name="brands" id="brands-hidden-input">
@endif
