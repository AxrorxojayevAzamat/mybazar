<nav class="navbar navbar-expand-lg" id="main_navbar">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown dropdown-main">
                <!-- Main dropdown -->
                <a class="nav-link dropdown-toggle main-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="center-icon">
                        <!-- <div class="round">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div> -->
                        <i class="mbcatalog"></i>
                    </div>
                    Весь каталог
                </a>
                <!-- first dropdown -->

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- 1 -->
                    @foreach($gCategories as $category)
                    <li class="nav-item dropdown">
                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown{{$category->id}}" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img  class="menu-discount-icon" src="{{asset('images/discount.svg')}}"> {{$category->name}}
                        </a>
                        <!-- second dropdown -->
                        @if(count($category->children))
                        <ul class="dropdown-menu d2" aria-labelledby="navbarDropdown{{$category->id}}">
                            <!-- 1.1 -->
                            @include('layouts.menusub',['childs' => $category->children])
                            <li class="full-image-banner">
                                <img src="{{asset('images/menu-banner1.jpg')}}" alt="">
                            </li>
                            <li class="full-image-banner2">
                                <img src="{{asset('images/menu-banner2.png')}}" alt="">
                            </li>
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
    <div class="pn-ProductNav_Wrapper">
        <nav id="pnProductNav" class="pn-ProductNav">
            <div id="pnProductNavContents" class="pn-ProductNav_Contents">
                <a href="#" class="pn-ProductNav_Link chairs" aria-selected="true">Chairs</a>
                <a href="#" class="pn-ProductNav_Link">Новые товары</a>
                <a href="#" class="pn-ProductNav_Link">Скидки</a>
                <a href="#" class="pn-ProductNav_Link">Акции</a>
                <a href="#" class="pn-ProductNav_Link">Топ бренды</a>
                <a href="#" class="pn-ProductNav_Link">Блог</a>
                <a href="#" class="pn-ProductNav_Link">Видеоролики</a>
                <a href="#" class="pn-ProductNav_Link">Доставка</a>
                <a href="#" class="pn-ProductNav_Link">Для бизнеса</a>
                <a href="#" class="pn-ProductNav_Link">Магазины</a>
                <a href="#" class="pn-ProductNav_Link">Оплата</a>
                <span id="pnIndicator" class="pn-ProductNav_Indicator"></span>
            </div>
        </nav>
        <button id="pnAdvancerLeft" class="pn-Advancer pn-Advancer_Left" type="button">
            <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z"/></svg>
        </button>
        <button id="pnAdvancerRight" class="pn-Advancer pn-Advancer_Right" type="button">
            <svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z"/></svg>
        </button>
    </div>
</nav>
