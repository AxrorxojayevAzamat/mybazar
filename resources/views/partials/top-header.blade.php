<div class="top-header">
    <div>
        <a href="tel" class="bold tel">+998 92 123 45 67</a>
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
        <a href="#" class="uzb">O'zb</a>
        <a href="#" class="active ru">Рус</a>
        <a href="#" class="en">En</a>
    </div>
</div>
