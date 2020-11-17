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

                <ul class="dropdown-menu all-dropdowns" aria-labelledby="navbarDropdown">
                    <!-- 1 -->
                    @foreach($gCategories as $category)
                    <li class="nav-item dropdown">
                        <a class="dropdown-item{{ count($category->children) ? ' first-dropdown' : '' }}" href="{{ route('categories.show', products_path($category)) }}">
                            <img class="menu-discount-icon" src="{{asset('images/discount.svg')}}"> {{$category->name}}
                        </a>

                        @if(count($category->children))
                            @php($banner = false)
                            @include('layouts.menusub', ['children' => $category->children])
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
{{--                <a href="#" class="pn-ProductNav_Link chairs" aria-selected="true">Chairs</a>--}}
                <a href="#" class="pn-ProductNav_Link">{{ trans('frontend.nav.new_products') }}</a>
                <a href="{{ route('discounts.index') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.discount_stock') }}</a>
                <a href="#" class="pn-ProductNav_Link">{{ trans('frontend.nav.stock') }}</a>
                <a href="{{ route('brands') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.top_brands') }}</a>
                <a href="#" class="pn-ProductNav_Link">{{ trans('frontend.nav.blog') }}</a>
                <a href="{{ route('videos.index') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.videos') }}</a>
                <a href="{{ route('delivery') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.delivery') }}</a>
                <a href="#" class="pn-ProductNav_Link">{{ trans('frontend.nav.business') }}</a>
                <a href="{{ route('shops.index') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.shops') }}</a>
                <a href="#" class="pn-ProductNav_Link">{{ trans('frontend.nav.pay') }}</a>
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
