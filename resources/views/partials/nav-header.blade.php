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
                    @lang('menu.whole_catalog')
                </a>
                <!-- first dropdown -->

                <ul class="dropdown-menu all-dropdowns" aria-labelledby="navbarDropdown">
                    <!-- 1 -->
                    @foreach($gCategories as $category)
                    <li class="nav-item dropdown">
                        <a class="dropdown-item{{ count($category->children) ? ' first-dropdown' : '' }}"
                           href="{{ route('categories.show', products_path($category)) }}"
                           onmouseover="setBanner('{{$category->photoOriginal}}', '{{$category->slug}}', {{$category->brands}})"
                           onmouseout="removeBanner('{{$category->slug}}')"
                        >
                            <img class="menu-discount-icon" src="{{$category->iconOriginal}}"> {{$category->name}}
                        </a>

                        @if(count($category->children))
                            @php($banner = false)
                            @include('layouts.menusub', ['children' => $category->children])
                        @endif
                    </li>
                    @endforeach
{{--                    <li class="full-image-banner" >--}}
{{--                        <img id="category_banner" alt="">--}}
{{--                    </li>--}}
                </ul>
            </li>
        </ul>
    </div>
    <div class="pn-ProductNav_Wrapper">
        <nav id="pnProductNav" class="pn-ProductNav">
            <div id="pnProductNavContents" class="pn-ProductNav_Contents">
                <a href="{{ route('products.new-products') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.new_products') }}</a>
                <a href="{{ route('discounts.index') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.discount') }}</a>
                <a href="{{ route('brands') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.top_brands') }}</a>
                <a href="{{ route('blogs') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.blogs') }}</a>
                <a href="{{ route('videos.index') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.videos') }}</a>
                <a href="{{ route('delivery') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.delivery') }}</a>
                <a href="{{ route('stores.index') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.shops') }}</a>
                <a href="{{ route('pay') }}" class="pn-ProductNav_Link">{{ trans('frontend.nav.pay') }}</a>
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
<script>
    function setBanner(photo, slug, brands) {
        // console.log(brands)
        $(`#full-image-banner_${slug}`).html(`<img src="https://shop.sec.uz${photo}" id="categoryBanner" alt="">`)
        $(`#full-image-banner_${slug} img`).css('display', 'inline')
        $(`#banner2_${slug}`).html('<div class="all-brands"><a href="{{ route('brands') }}">{{trans("menu.all_brands")}}</a></div>')
        $(`#banner2_${slug}`).css({'display': 'list-item', 'background-color': '#fff'})
        for(let i=0; i < 4; i++) {
            if(brands[i]) {
                $(`#banner2_${slug}`).append(`<img src="http://shop.sec.uz/storage/files/brands/${brands[i].id}/original/${brands[i].logo}" alt="">`)
            }
        }
    }
    function removeBanner(slug) {
        $(`#full-image-banner_${slug} img`).css('display', 'none')
        $(`#banner2_${slug}`).css('display', 'none')
        $(`#banner2_${slug}`).html('<div class="all-brands"><a href="{{ route('brands') }}">{{trans("menu.all_brands")}}</a></div>')
    }
</script>
