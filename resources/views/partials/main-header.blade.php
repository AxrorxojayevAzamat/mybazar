<div class="main-header">
    <div class="logo">
        <a href="/">
            <img src="{{asset('images/mybazar_logo.svg')}}" alt="">
        </a>
    </div>
    <form action="/search" id="search-bar" class="search-bar form-control" method="GET">
            <div class="input-with-tags">
                <input name="search" id="search-input" autocomplete="off" class="main-search-bordered-input" type="search" placeholder="{{ trans('frontend.search_placeholder') }}" do-not-use-data-role="tagsinput">
            </div>
            <div class="autocomplete-tags" id="droping">


            </div>
            <select class="form-control select-main-search">
                @foreach ($gCategories as $category)
                    <option>{{ $category->name }}</option>
                @endforeach
            </select>
            <button class="search btn" type="submit"><i class="mbsearch"></i></button>
    </form>
    <div class="from-statistics-to-account">
        <ul class="navbar-right">
            <li>
                <a href="#" id="dropdownComparison" class="dropdownToggle"> <i class="mbcompare"><span></span></i> @lang('menu.compare')</a>
                <div class="compare-items" id="compareItems">
                    <ul class="selected-items">
                        <li class="item" >
                            <div class='product-img'>
                                <a href="#"><img src="{{asset('images/popular1.png')}}"></a>
                            </div>
                            <div class='description'>
                                <a href="#"><h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5></a>
                                <p class='price'> 968 0000</p>
                            </div>
                            <button class="btn delete-btn"><i class="mbexit_mobile"></i></button>
                        </li>
                        <li class="item" >
                            <div class='product-img'>
                                <a href="#"><img src="{{asset('images/popular1.png')}}"></a>
                            </div>
                            <div class='description'>
                                <a href="#"><h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5></a>
                                <p class='price'> 968 0000</p>
                            </div>
                            <button class="btn delete-btn"><i class="mbexit_mobile"></i></button>
                        </li>
                        <li class="item" >
                            <div class='product-img'>
                                <a href="#"><img src="{{asset('images/popular1.png')}}"></a>
                            </div>
                            <div class='description'>
                                <a href="#"><h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5></a>
                                <p class='price'> 968 0000</p>
                            </div>
                            <button class="btn delete-btn"><i class="mbexit_mobile"></i></button>
                        </li>
                        <li class="item" >
                            <div class='product-img'>
                                <a href="#"><img src="{{asset('images/popular1.png')}}"></a>
                            </div>
                            <div class='description'>
                                <a href="#"><h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5></a>
                                <p class='price'> 968 0000</p>
                            </div>
                            <button class="btn delete-btn"><i class="mbexit_mobile"></i></button>
                        </li>

                    </ul>
                    <div class="bottom-btn">
                        <button class="btn bold switch-to-compare">
                            @lang('frontend.compare_products')
                        </button>
                    </div>
                </div>
            </li>

            <li>
                @include('cart.header-show')
            </li>
            <li>
                <a href="{{ route('user.favorites') }}" class="wish-list dropdownToggle"> <i class="mbfavorite"><span class="@if(!Auth::guest() && Auth::user()->favorites()->exists()) <?php echo 'counter'?> @endif">@if(!Auth::guest()){{ Auth::user()->favorites()->count() }}@endif</span></i> @lang('menu.favorites')</a>
            </li>

            @guest
            <li>
                <a href="{{ route('login') }}" class="account bold dropdownToggle"><i class="mbaccount"></i>@lang('menu.account')</a>
            </li>
            @else

                <li>
                <a id="navbarDropdown" class="nav-link dropdown-toggle bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.profile') }}">

                        {{ __('Profile') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('user.favorites') }}">

                        {{ __('Favorites') }}
                    </a>

                    @if(Auth::user()->isUser() && Auth::user()->isManagerRoleRequested())
                        <a
                            class="dropdown-item" href="{{ route('profile.manager.request') }}"
                            onclick="event.preventDefault();
                            document.getElementById('request-manager-form').submit();"
                        >@lang('frontend.manager.request_manager_role')</a>

                        <form id="request-manager-form" action="{{ route('profile.manager.request') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif

                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</div>
