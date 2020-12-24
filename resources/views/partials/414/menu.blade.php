<nav id="menu" class="mm-menu_fullscreen">
    <a href="#page" class="mm-btn mm-btn_close mm-navbar__btn" id="close-menu-btn"></a>
    <ul>
        <li>
            <span>@lang('frontend.language')</span>
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
            <span>@lang('menu.whole_catalog')</span>
            <ul>
                @foreach($gCategories as $category)
                    <li>
                        <span>
                            <a href="{{ route('categories.show', products_path($category)) }}">
                                <img class="menu-discount-icon" src="{{$category->iconOriginal}}">{{$category->name}}
                            </a>
                        </span>
                        @if(count($category->children))
                            <ul>
                                @include('layouts.mobile-menu-sub', ['children' => $category->children])
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </li>

        <li><a href="{{ route('brands') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.top_brands') }}</a></li>
        <li><a href="{{ route('products.new-products') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.new_products') }}</a></li>
        <li><a href="{{ route('blogs') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.blogs') }}</a></li>
        <li><a href="{{ route('videos.index') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.videos') }}</a></li>
        <li><a href="{{ route('discounts.index') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.discount') }}</a></li>
        <li><a href="{{ route('stores.index') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.shops') }}</a></li>
        <li><a href="{{ route('pay') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.pay') }}</a></li>
        <li><a href="{{ route('delivery') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.delivery') }}</a></li>

        <li class="menu-tel-mail">
            <a href="tel:+998921234567" class="bold tel">+998 92 123 45 67</a>
            <a href="mailto:info@mybazar.com" class="email" target="_blank">info@mybazar.com</a>
        </li>
    </ul>
</nav>
