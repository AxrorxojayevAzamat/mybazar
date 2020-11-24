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
            <div class="autocomplete-tags">
                <a href="#">
                    <div class="item with-icon">
                        <i class="mbsearch_resulticon"></i>
                        <h6 class="title">Xiaomi Mi Max 2</h6>
                        <i class="mbgotoresults_searchresulticon"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="item brand">
                        <div class="image">
                            <img src="{{asset('images/mi_brand.png')}}" alt="">
                        </div>
                        <div class="description">
                            <h6 class="title">Xiaomi</h6>
                            <p class="sub-title brand">Бренд</p>
                        </div>
                        <i class="mbgotoresults_searchresulticon"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="item product">
                        <div class="image">
                            <img src="{{asset('images/mi_brand.png')}}" alt="">
                        </div>
                        <div class="description">
                            <h6 class="title">Xiaomi</h6>
                            <p class="sub-title price">3 698 334 <span>сум</span></p>
                        </div>
                        <i class="mbgotoresults_searchresulticon"></i>
                    </div>
                </a>
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
                <a href="#" class="wish-list dropdownToggle"> <i class="mbfavorite"><span></span></i> @lang('menu.favorites')</a>
            </li>

            @guest
            <li>
                <a href="{{ route('login') }}" class="account bold dropdownToggle"><i class="mbaccount"></i>@lang('menu.account')</a>
            </li>
            @else
            <li>
                <a id="navbarDropdown" class="nav-link dropdown-toggle bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.setting') }}">

                        {{ __('Profile') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('user.favorites') }}">

                        {{ __('Favorites') }}
                    </a>
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
    <div class="dropingdown" id="droping" style="width: 100%; background-color: black; color: white; position: absolute">Salom alekum</div>
</div>
