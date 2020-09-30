<form action="?" class="big-filter-without-title-checkbox" id="shop-filter-form">
    @if ($brands->isNotEmpty())
        @php($brandSlugs = explode(',', request('brands')))
        <button type="button" class="btn accordion active">@lang('frontend.brand')</button>
        <div id="filter2" class="panel">
            @foreach($brands as $i => $brand)
                <div  class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input brands-checkbox" id="brands-checkbox-{{ $i }}"
                           value="{{ $brand->slug }}" @if (in_array($brand->slug, $brandSlugs)) checked @endif>
                    <label class="custom-control-label" for="brands-checkbox-{{ $i }}">{{ $brand->name }}</label>
                </div>
            @endforeach
            <a class="show-more" href="#">Показать еще</a>
        </div>
        <input type="hidden" name="brands" id="brands-hidden-input">
    @endif

    <button type="button" class="btn accordion active">Цена</button>
    <div id="filter3" class="panel">
        <div class="outter-range-slider">
            <div class="form-group">
                <input type="text" class="js-input-from form-control" name="min_price" id="min-price" value="{{ request('min_price', 0) }}">
                <span>-</span>
                <input type="text" class="js-input-to form-control" name="max_price" id="max-price" value="{{ request('max_price', 0) }}">
            </div>
            <div class="range-slider">
                <input type="text" class="js-range-slider" value="">
            </div>

        </div>
    </div>
    <input type="submit" id="shop-filter-button" value="{{ trans('frontend.apply_filter') }}">
</form>
