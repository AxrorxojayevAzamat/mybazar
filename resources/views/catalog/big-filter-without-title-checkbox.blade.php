<form action="?" class="big-filter-without-title-checkbox" id="catalog-filter-form">
{{--    <button type="button" class="btn accordion active" >Технология</button>--}}
{{--    <div id="filter1"  class="panel">--}}
{{--        <div class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-1" >--}}
{{--            <label  class="custom-control-label" for="smallcustomCheck1-1">LED</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-2"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck1-2">OLED</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-3" >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck1-3">QLED</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-4"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck1-4">4K UHD</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck1-5"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck1-5">8K FHD</label>--}}
{{--        </div>--}}
{{--    </div>--}}

    @if ($brands->isNotEmpty())
        <button type="button" class="btn accordion active">@lang('frontend.brand')</button>
        <div id="filter2" class="panel">
            @foreach($brands as $i => $brand)
                <div  class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input brands-checkbox" id="brands-checkbox-{{ $i }}"
                           value="{{ $brand->slug }}" data-id="{{ $brand->id }}" data-index="{{ $i }}">
                    <label class="custom-control-label" for="brands-checkbox-{{ $i }}">{{ $brand->name }}</label>
                </div>
            @endforeach
            <a class="show-more" href="#">Показать еще</a>
        </div>
    @endif

    @if ($stores->isNotEmpty())
        <button type="button" class="btn accordion active">@lang('frontend.stores')</button>
        <div id="filter2" class="panel">
            @foreach ($stores as $i => $store)
                <div  class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input stores-checkbox" id="stores-checkbox-{{ $i }}" value="{{ $store->slug }}">
                    <label class="custom-control-label" for="stores-checkbox-{{ $i }}">{{ $store->name }}</label>
                </div>
            @endforeach
            <a class="show-more" href="#">Показать еще</a>
        </div>
    @endif
    <button type="button" class="btn accordion active">Цена</button>
    <div id="filter3" class="panel">
        <div class="outter-range-slider">
            <div class="form-group">
                <input type="text" class="js-input-from form-control" name="min-price" id="min-price" value="0">
                <span>-</span>
                <input type="text" class="js-input-to form-control" name="max-price" id="max-price" value="0">
            </div>
            <div class="range-slider">
                <input type="text" class="js-range-slider" value="" />
            </div>

        </div>
    </div>

{{--    <button type="button" class="btn accordion active" >Диоганаль</button>--}}
{{--    <div id="filter4"  class="panel">--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-1"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck4-1">До 19 дюймов</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-2"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck4-2">20 - 26 дюймов</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-3"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck4-3">27 - 32 дюймов</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-4"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck4-4">37 - 43 дюймов</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-5"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck4-5">45 - 49 дюймов</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-6"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck4-6">50 - 58 дюймов</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck4-7"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck4-7">60 дюймов и более</label>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <button type="button" class="btn accordion active">Функции</button>--}}
{{--    <div id="filter5"  class="panel">--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck5-1"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck5-1">SmartTV</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck5-2"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck5-2">WiFi</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck5-3"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck5-3">Поддержка HDR</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck5-4"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck5-4">Встроенный сабвуфер</label>--}}
{{--        </div>--}}
{{--        <div  class="custom-control custom-checkbox">--}}
{{--            <input type="checkbox" class="custom-control-input" id="smallcustomCheck5-5"  >--}}
{{--            <label class="custom-control-label" for="smallcustomCheck5-5">Curved</label>--}}
{{--        </div>--}}
{{--    </div>--}}
    <input type="submit" id="catalog-filter-button" value="{{ trans('frontend.apply_filter') }}">
</form>
