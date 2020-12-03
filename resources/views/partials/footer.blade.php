<footer>
    <div class="footer-outter">
        <div class="footer-414">
            <div class="accordion" id="footerCollapse">
                @foreach($pages as $page)
                    @if(count($page->children))
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">
                                    <button class="btn " type="button" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                        <a href="{{route('pages.show', $page)}}">{{$page->menu_title}}</a>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#footerCollapse">
                                <div class="card-body">
                                    @foreach($page->children as $child)
                                        <a href="{{route('pages.show', $child)}}">{{$child->menu_title}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="links row">
            @foreach($pages as $page)
                @if(count($page->children))
                    <div class="col-4">
                        <h5 class="bold footer-title"><a href="{{route('pages.show', page_path($child))}}">{{$page->menu_title}}</a></h5>
                        @foreach($page->children as $child)
                            <a href="{{route('pages.show', page_path($child))}}">{{$child->menu_title}}</a>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
        <div class="social-contacts">
            <img src="{{asset('images/mybazar_logo_footer.svg')}}" alt="" class="footer-logo">
            <div class="footer-icons">
                <a href="https://www.facebook.com" target="_blank"><i class="mbfacebook"></i></a>
                <a href="https://web.telegram.org/" target="_blank"><i class="mbtelegram"></i></a>
                <a href="https://www.whatsapp.com" target="_blank"><i class="mbwhatsapp"></i></a>
                <a href="https://vk.com" target="_blank"><i class="mbvkontakte"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="mbtwitter"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="mbinstagram"></i></a>
            </div>
            <div class="contacts">
                <a href="tel:+998921234567" class="bold tel">+998 92 123 45 67</a>
                <a href="mailto:info@mybazar.com" class="email" target="_blank">info@mybazar.com</a>
            </div>
        </div>
    </div>
    <p>@lang('frontend.ltd') "MyBazar" - 2020. @lang('footer.all_rights_reserved')</p>
</footer>
