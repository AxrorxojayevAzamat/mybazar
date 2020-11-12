<div class="main-header">
    <div class="logo">
        <a href="/">
            <img src="{{asset('images/mybazar_logo.svg')}}" alt="">
        </a>
    </div>
    <form id="search-bar" class="search-bar form-control">
            <div class="input-with-tags">
                <input id="search-input" class="main-search-bordered-input" type="search" placeholder="{{ trans('frontend.search_placeholder') }}" do-not-use-data-role="tagsinput">
            </div>
            <select class="form-control select-main-search">
                @foreach ($gCategories as $category)
                    <option>{{ $category->name }}</option>
                @endforeach
            </select>
            <button class="search btn" type="submit"><i class="mbsearch"></i></button>   
    </form>
    <div class="from-statistics-to-account">
        <div class="dropdown compare-dropdown">
            <a href="#" class="btn dropdown-toggle comparison" role="button" id="dropdownComparison" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mbcompare"><span></span></i> @lang('menu.compare')
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownComparison">
                <div class="selected-items">
                    <div class='dropdown-item animated fadeInDown' >
                        <div class='product-img'>
                            <img src="{{asset('images/popular1.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'> 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </div>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular2.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular3.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular1.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                </div>
                <div class="bottom-btn">
                    <button class="btn bold switch-to-compare">
                        @lang('frontend.compare_products')
                    </button>
                </div>
            </div>
        </div>

        <div class="dropdown cart-dropdown" >
            <a href="#" class="btn dropdown-toggle cart" role="button" id="dropdownCart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mbcart"><span class="counter">{{ count((array) session('cart')) }}</span></i> @lang('menu.carts')
            </a>
            <div class="dropdown-menu"  aria-labelledby="dropdownCart">
                <div class="selected-items">
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular1.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular2.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular3.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                    <a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                            <img src="{{asset('images/popular1.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>LEGO Ninjago Movie 70620, 5041 дет.</h5>
                            <p class='price'>720 0000</p>
                        </div>
                        <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
                    </a>
                </div>
                <div class="bottom-btn">
                    <button class="btn bold switch-to-cart">
                        @lang('frontend.go_to_cart')
                    </button>
                </div>
            </div>
        </div>
        <a href="#" class=" wish-list"> <i class="mbfavorite"><span></span></i> @lang('menu.favorites')</a>
         <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
            <a href="{{ route('login') }}" class="account bold"><i class="mbaccount"></i>@lang('menu.account')</a>
        </li>
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
</div>
