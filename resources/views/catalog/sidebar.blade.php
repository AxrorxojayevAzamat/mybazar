<form action="?" class="big-filter-without-title-checkbox" id="catalog-filter-form">
    @include('filters.category-filter')
    @if (isset($brands))

        <button type="button" class="btn accordion active">@lang('frontend.brand')</button>
        <div id="filter1" class="panel">
            @foreach($brands as $i => $brand)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="brands[]" class="custom-control-input brands-checkbox" id="brands-checkbox-{{ $i }}"
                           value="{{ $brand->id }}" @if (request('brands') !== null and in_array($brand->id, request('brands'))) checked @endif>
                    <label class="custom-control-label" for="brands-checkbox-{{ $i }}">{{ $brand->name }}</label>
                </div>
            @endforeach
            <a class="show-more" href="#">@lang('frontend.show_more')</a>
        </div>
        {{--        <input type="hidden" name="brands" id="brands-hidden-input">--}}
    @endif

    @if (isset($stores))
        <button type="button" class="btn accordion active">@lang('frontend.stores')</button>
        <div id="filter2" class="panel">
            @foreach ($stores as $i => $store)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="stores[]" class="custom-control-input stores-checkbox" id="stores-checkbox-{{ $i }}"
                           value="{{ $store->id }}" @if (request('stores') !== null and in_array($store->id, request('stores'))) checked @endif>
                    <label class="custom-control-label" for="stores-checkbox-{{ $i }}">{{ $store->name }}</label>
                </div>
            @endforeach
            <a class="show-more" href="#">@lang('frontend.show_more')</a>
        </div>
    @endif


    @include('filters.price-filter')

    @if (!empty($groupModifications) && $groupModifications['data'] !== false)
        @php($modificationArray = request('modification'))
        @foreach($groupModifications as $i => $modifications)
            <button type="button" class="btn accordion active">{{ $modifications[0]->characteristic->name }}</button>
            <div id="filter2" class="panel">
                @foreach ($modifications as $j => $modification)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input modifications-checkbox-{{ $i }}" id="modifications-checkbox-{{ $i }}-{{ $j }}"
                               value="{{ $modification->value }}" name="modification[]" @if (request('modification') !== null and in_array($modification->value, request('modification'))) checked @endif>
                        <label class="custom-control-label" for="modifications-checkbox-{{ $i }}-{{ $j }}">{{ $modification->value }}</label>
                    </div>
                @endforeach
                <a class="show-more" href="#">@lang('frontend.show_more')</a>
            </div>
{{--            <input type="hidden" name="modification[{{ $modification->characteristic_id }}]" id="modifications-{{ $i }}-hidden-input">--}}
        @endforeach
    @endif

    <input type="submit" id="catalog-filter-button" value="{{ trans('frontend.apply_filter') }}">
    <input type="hidden" name="order_by" id="sort-hidden-input">
</form>
