<div class="main-header">
    <div class="logo">
        <a href="/">
            <img src="{{asset('images/mybazar_logo.svg')}}" alt="">
        </a>
    </div>
    <form action="/search" id="search-bar" class="search-bar form-control" method="GET">
            <div class="input-with-tags">
                <input name="search" id="search-input" autocomplete="off" class="main-search-bordered-input" type="search" placeholder="{{ trans('frontend.search_placeholder') }}">
            </div>
            <div class="autocomplete-tags" id="droping">


            </div>
            <select class="form-control select-main-search" name="category_id" id="categoryIdInSearch">
                @foreach ($gCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button class="search btn" type="submit"><i class="mbsearch"></i></button>
    </form>
    <div class="from-statistics-to-account">
        <ul class="navbar-right">
            <li id="compareCard">
                <a href="#" id="dropdownComparison" class="dropdownToggle" > <i class="mbcompare"><span class=""></span></i> @lang('menu.compare')</a>
                <div class="compare-items" id="compareItems" >
                    <ul class="selected-items overflow-auto" id="compareSuccessItems">

                    </ul>
                    <div class="bottom-btn" id="compareBtn">
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

                        <form id="request-manager-form" action="{{ route('profile.manager.request') }}" method="POST" style="display: none;">
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
            </li>
            @endguest
        </ul>
    </div>
</div>
