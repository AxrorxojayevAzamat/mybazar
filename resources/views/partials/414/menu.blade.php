<nav id="menu" class="mm-menu_fullscreen">
    <a href="#page" class="mm-btn mm-btn_close mm-navbar__btn" id="close-menu-btn"></a>
    <ul>
        <li>
            <span>Язык</span>
            <ul>
                @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                           href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li>
            <span>Весь каталог</span>
            <ul>
                @foreach($gCategories as $category)
                    <li>
                            <span>
                                <img class="menu-discount-icon" src="{{asset('images/discount.svg')}}">
                                {{$category->name}}
                            </span>
                        @if($category->children)
                            <ul>
                                @include('layouts.mobile-menu-sub',['childs' => $category->children])
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </li>

        <li><a href="#">Акции </a></li>
        <li><a href="#">Скидки</a></li>
        <li>
            <span>Товары</span>
            <ul>
                <li><a href="#about/history">History</a></li>
                <li>
                    <span>The team</span>
                    <ul>
                        <li><a href="#about/team/management">Management</a></li>
                        <li><a href="#about/team/sales">Sales</a></li>
                        <li><a href="#about/team/development">Development</a></li>
                    </ul>
                </li>
                <li><a href="#about/address">Our address</a></li>
            </ul>
        </li>

        <li><a href="#">Топ бренды </a></li>
        <li><a href="#">Блог</a></li>
        <li><a href="#">Видеоролики</a></li>
        <li><a href="#">Доставка</a></li>
        <li><a href="#">Для бизнеса</a></li>
        <li><a href="#">Магазины</a></li>
        <li><a href="#">Оплата</a></li>
        <li class="menu-tel-mail">
            <a class="bold tel">+998 92 123 45 67</a>
            <a href="#" class="email">info@mybazar.com</a>
        </li>
    </ul>
</nav>
