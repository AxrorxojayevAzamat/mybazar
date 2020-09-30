<div class="top-header">
    <div>
        <a href="#" class="bold tel">+998 92 123 45 67</a>
        <a href="#" class="email">info@mybazar.com</a>
    </div>
    <div class="hot-news owl-carousel owl-theme">
        <a href="#">
            <span class="bold">РАСПРОДАЖА КНИГ!</span>
            Снизили цены на более 3 тысячи книг
        </a>
        <a href="#">
            Купить кондиционер со скидкой 30%
        </a>
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
