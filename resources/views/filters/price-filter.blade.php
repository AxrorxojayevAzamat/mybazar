<button type="button" class="btn accordion_filter active">@lang('frontend.price')</button>
<div id="filter3" class="panel">
    <div class="outter-range-slider">
        <div class="form-group">
            <input type="text" class="js-input-from form-control" name="min_price" id="min-price"
                   value="{{ request('min_price', $min_price) }}">
            <span>-</span>
            <input type="text" class="js-input-to form-control" name="max_price" id="max-price"
                   value="{{ request('max_price', $max_price) }}">
        </div>
        <div class="range-slider">
            <input type="text" class="js-range-slider" value="">
        </div>
    </div>
</div>
