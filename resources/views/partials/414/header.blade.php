<div id="header-2" class="header">
    <div class="menu-logo">
        <a href="#menu" id="open-menu-btn"><i class="mbcatalog"></i></a>
        <img src="{{asset('images/mybazar_logo.svg')}}" alt="">
    </div>

    <div class="other-icons">
{{--        <div class="search-button">--}}
{{--            <a href="#search" class="search-toggle" data-selector="#header-2"></a>--}}
{{--        </div>--}}
        <a href="#" class="search"><button class="btn search search-toggle" data-selector="#header-2"><i class="mbsearch"><span></span></button></i> </a>
        <a href="{{ route('compare') }}" class="comparison"><i class="mbcompare"><span></span></i> </a>
        <a href="{{ route('cart') }}" class="cart"><i class="mbcart"><span></span></i></a>
        <a href="{{ route('user.favorites') }}" class="wish-list"><i class="mbfavorite"><span></span></i></a>
        <a href="{{ route('login') }}" class="account"><i class="mbaccount" style="margin: 0"></i></a>
    </div>
    <form action="" class="search-box">
        <input type="text" class="text search-input" placeholder="@lang('frontend.search_on_mybazar')"/>
    </form>
</div>
