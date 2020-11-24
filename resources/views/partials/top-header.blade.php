<div class="top-header">
    <div>
        <a href="tel:+998921234567" class="bold tel">+998 92 123 45 67</a>
        <a href="#" class="email">info@mybazar.com</a>
    </div>
    <div class="hot-news owl-carousel owl-theme">
        @foreach($discountProducts as $product)
            <a href="{{ route('products.show', $product) }}">
                @lang('header.discount', ['product' => $product->name, 'discount'=> $product->discount * 100])
            </a>
        @endforeach
    </div>
    <div class="lang">
        @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
            <a rel="alternate" hreflang="{{ $localeCode }}" class="{{ $localeCode != App::getLocale() ? : 'active' }}"
               href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        @endforeach
    </div>
    <div class="lang-medium">
        @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
            <a rel="alternate" hreflang="{{ $localeCode }}" class="{{ $localeCode != App::getLocale() ? : 'active' }}"
               href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native_medium'] }}
            </a>
        @endforeach
    </div>
</div>
