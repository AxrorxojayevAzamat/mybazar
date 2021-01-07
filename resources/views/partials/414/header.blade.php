<div id="header-2" class="header">
    <div class="menu-logo">
        <a href="#menu" id="open-menu-btn"><i class="mbcatalog"></i></a>
        <a href="/">
            <img src="{{ asset('images/mybazar_logo.svg') }}" alt="">
        </a>
    </div>

    <div class="other-icons">
        <a href="#" class="search">
            <button class="btn search search-toggle" data-selector="#header-2">
                <i class="mbsearch"><span></span></i>
            </button>
        </a>
        <a href="{{ route('compare') }}" class="comparison"><i class="mbcompare"><span></span></i> </a>
        <form action="/cart-list" method="GET" id="goToCart">
            <input type="hidden" id="cart_products_id" name="product_id" class="cart_products_id">
            <button class="btn p-0 bold switch-to-compare">
                <a href="/cart-list" class="cart"><i class="mbcart"><span></span></i></a>
            </button>
        </form>

        <a href="{{ route('user.favorites') }}" class="wish-list"><i class="mbfavorite"><span></span></i></a>
        @guest
            <a href="{{ route('login') }}" class="account"><i class="mbaccount" style="margin: 0"></i></a>
        @else

            <a id="navbarDropdown" class="nav-link dropdown-toggle bold" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="mbaccount" style="margin: 0"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('user.profile') }}">

                    {{ trans('auth.profile') }}
                </a>
                <a class="dropdown-item" href="{{ route('user.favorites') }}">

                    {{ trans('auth.favorites') }}
                </a>

                @if(Auth::user()->isUser() && Auth::user()->isManagerRoleRequested())
                    <a
                        class="dropdown-item" href="{{ route('profile.manager.request') }}"
                        onclick="event.preventDefault();
                            document.getElementById('request-manager-form').submit();"
                    >@lang('frontend.manager.request_manager_role')</a>

                    <form id="request-manager-form" action="{{ route('profile.manager.request') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                @endif

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ trans('auth.logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endguest
    </div>
    <form action="/search" class="search-box form-control" method="GET">
        <input type="text" id="search-input-mobile" class="text" placeholder="@lang('frontend.search_on_mybazar')"/>
    </form>
    <div class="autocomplete-tags" id="droping-mobile">


    </div>
</div>

