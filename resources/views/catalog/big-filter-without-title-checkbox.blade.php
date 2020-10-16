<form action="?" class="big-filter-without-title-checkbox" id="catalog-filter-form">
    @if ($brands->isNotEmpty())
        @php($brandSlugs = explode(',', request('brands')))
        <button type="button" class="btn accordion active">@lang('frontend.brand')</button>
        <div id="filter2" class="panel">
            @foreach($brands as $i => $brand)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input brands-checkbox" id="brands-checkbox-{{ $i }}"
                           value="{{ $brand->slug }}" @if (in_array($brand->slug, $brandSlugs)) checked @endif>
                    <label class="custom-control-label" for="brands-checkbox-{{ $i }}">{{ $brand->name }}</label>
                </div>
            @endforeach
            <a class="show-more" href="#">@lang('frontend.show_more')</a>
        </div>
        <input type="hidden" name="brands" id="brands-hidden-input">
    @endif

    @if ($stores->isNotEmpty())
        @php($storeSlugs = explode(',', request('stores')))
        <button type="button" class="btn accordion active">@lang('frontend.stores')</button>
        <div id="filter2" class="panel">
            @foreach ($stores as $i => $store)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input stores-checkbox" id="stores-checkbox-{{ $i }}"
                           value="{{ $store->slug }}" @if (in_array($store->slug, $storeSlugs)) checked @endif>
                    <label class="custom-control-label" for="stores-checkbox-{{ $i }}">{{ $store->name }}</label>
                </div>
            @endforeach
            <a class="show-more" href="#">@lang('frontend.show_more')</a>
        </div>
        <input type="hidden" name="stores" id="stores-hidden-input">
    @endif
    <button type="button" class="btn accordion active">@lang('frontend.price')</button>
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

    @if (!empty($groupModifications))
        @php($modificationArray = request('modification'))
        @foreach($groupModifications as $i => $modifications)
            @php($modificationValues = explode(',', $modificationArray[$modifications[0]->characteristic_id]))
            <button type="button" class="btn accordion active">{{ $modifications[0]->name }}</button>
            <div id="filter2" class="panel">
                @foreach ($modifications as $j => $modification)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input modifications-checkbox-{{ $i }}" id="modifications-checkbox-{{ $i }}-{{ $j }}"
                               value="{{ $modification->value }}" @if (in_array($modification->value, $modificationValues)) checked @endif>
                        <label class="custom-control-label" for="modifications-checkbox-{{ $i }}-{{ $j }}">{{ $modification->value }}</label>
                    </div>
                @endforeach
                <a class="show-more" href="#">@lang('frontend.show_more')</a>
            </div>
            <input type="hidden" name="modification[{{ $modification->characteristic_id }}]" id="modifications-{{ $i }}-hidden-input">
        @endforeach
    @endif

    <input type="submit" id="catalog-filter-button" value="{{ trans('frontend.apply_filter') }}">
</form>
