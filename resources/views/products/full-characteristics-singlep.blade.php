<div class="outter-full-characteristics">
    <div class="accordion-characteristics">
        <button type="button" class="btn accordion active">@lang('frontend.all_charactires')</button>
        <div id="filter1" class="panel">
            @foreach($product->values as $value)
                <p class="grey">{{ $value->characteristic->name }}</p>
                <p class="black">{{ $value->value }}</p>
            @endforeach
        </div>
    </div>
</div>
