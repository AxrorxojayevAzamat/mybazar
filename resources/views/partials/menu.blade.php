<div id="page">

    <!-- responsive 414 MENU -->
    <nav id="menu" class="mm-menu_fullscreen">
        <a  href="#page" class="mm-btn mm-btn_close mm-navbar__btn" id="close-menu-btn"></a>
        <ul>
            <li>
                <span>Язык</span>
                <ul>
                    <li><a href="#">O'zbekcha</a></li>
                    <li><a href="#">Русский</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </li>
            <li>
                <span>Весь каталог</span>
                <ul>
                    @foreach($gCategories as $category)
                    <li>
                        <span>
                            <img  class="menu-discount-icon" src="{{asset('images/discount.svg')}}">
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
                            <li>
                                <a href="#about/team/management"
                                   >Management</a
                                >
                            </li>
                            <li>
                                <a href="#about/team/sales">Sales</a>
                            </li>
                            <li>
                                <a href="#about/team/development"
                                   >Development</a
                                >
                            </li>
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

    <!-- Responsive 414 Header -->
    <div id="header-2" class="header">
        <div class="menu-logo">
            <a href="#menu" id="open-menu-btn"><i class="mbcatalog"></i></a>
            <img src="{{asset('images/mybazar_logo.svg')}}" alt="">
        </div>
        <div class="other-icons">
            <a href="#" class="comparison"><i class="mbcompare"><span></span></i> </a>
            <a href="#" class="cart"><i class="mbcart"><span></span></i></a>
            <a href="#" class="wish-list"><i class="mbfavorite"><span></span></i></a>
            <a href="#" class="account"><i class="mbaccount"></i></a>
        </div>
        <form action="" class="search-box">
            <input type="text" class="text search-input" placeholder="Поиск на myBazar..." />
        </form>
        <div class="search-button">
            <a href="#" class="search-toggle" data-selector="#header-2"></a>
        </div>
    </div>

    <!-- FULL CONTENT BODY -->
    <div class="content container-fluid">

        <!-- All headers 1560 -->
        <section class="navbar-1560">
            @include('partials.top-header')
            @include('partials.main-header')
            @include('partials.nav-header')
        </section>
        
         @yield('banner')
        
        <nav aria-label="breadcrumb">
            <div class="breadcrumb-item">
                @section('breadcrumbs', Breadcrumbs::render())
                @yield('breadcrumbs')
            </div>
        </nav>
        @yield('page')
        <!-- NEWS LETTER -->
        @include ('layouts.news-letter')

        <!-- FOOTER -->
        @include ('partials.footer')
    </div>
</div>
