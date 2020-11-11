<footer>
    <div class="footer-outter">
        <div class="footer-414">
            <div class="accordion" id="footerCollapse">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                @lang('footer.press_center')
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#footerCollapse">
                        <div class="card-body">
                            <a href="#">@lang('footer.history')</a>
                            <a href="#">@lang('footer.mission_and_values')</a>
                            <a href="#">@lang('footer.press_releases')</a>
                            <a href="#">@lang('footer.mm_about_us')</a>
                            <a href="#">@lang('footer.photos')</a>
                            <a href="#">@lang('footer.press_contacts')</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                @lang('footer.service')
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#footerCollapse">
                        <div class="card-body">
                            <a href="#">@lang('footer.services')</a>
                            <a href="#">@lang('footer.delivery')</a>
                            <a href="#">@lang('footer.self_call')</a>
                            <a href="#">@lang('footer.contacts')</a>
                            <a href="#">@lang('footer.service_center')</a>
                            <a href="#">@lang('footer.leave_feedback')</a>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                @lang('footer.about_company')
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#footerCollapse">
                        <div class="card-body">
                            <a href="#">@lang('footer.tenders')</a>
                            <a href="#">@lang('footer.advertising_website')</a>
                            <a href="#">@lang('footer.for_landlords')</a>
                            <a href="#">@lang('footer.for_tenants')</a>
                            <a href="#">@lang('footer.sale_entities')</a>
                            <a href="#">@lang('footer.vacancies')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="links row">
            <div class="col-4">
                <h5 class="bold footer-title">@lang('footer.press_center')</h5>
                <a href="#">@lang('footer.history')</a>
                <a href="#">@lang('footer.mission_and_values')</a>
                <a href="#">@lang('footer.press_releases')</a>
                <a href="#">@lang('footer.mm_about_us')</a>
                <a href="#">@lang('footer.photos')</a>
                <a href="#">@lang('footer.press_contacts')</a>
            </div>
            <div class="col-3">
                <h5 class="bold footer-title">@lang('footer.service')</h5>
                <a href="#">@lang('footer.services')</a>
                <a href="#">@lang('footer.delivery')</a>
                <a href="#">@lang('footer.self_call')</a>
                <a href="#">@lang('footer.contacts')</a>
                <a href="#">@lang('footer.service_center')</a>
                <a href="#">@lang('footer.leave_feedback')</a>
            </div>
            <div class="col-5">
                <h5 class="bold footer-title">@lang('footer.about_company')</h5>
                <a href="#">@lang('footer.tenders')</a>
                <a href="#">@lang('footer.advertising_website')</a>
                <a href="#">@lang('footer.for_landlords')</a>
                <a href="#">@lang('footer.for_tenants')</a>
                <a href="#">@lang('footer.sale_entities')</a>
                <a href="#">@lang('footer.vacancies')</a>
            </div>
        </div>
        <div class="social-contacts">
            <img src="{{asset('images/mybazar_logo_footer.svg')}}" alt="" class="footer-logo">
            <div class="footer-icons">
                <a href=""><i class="mbfacebook"></i></a>
                <a href=""><i class="mbtelegram"></i></a>
                <a href=""><i class="mbwhatsapp"></i></a>
                <a href=""><i class="mbvkontakte"></i></a>
                <a href=""><i class="mbinstagram"></i></a>
                <a href=""><i class="mbtelegram"></i></a>
            </div>
            <div class="contacts">
                <a href="tel" class="bold tel">+998 92 123 45 67</a>
                <a href="#" class="email">info@mybazar.com</a>
            </div>
        </div>
    </div>
    <p>СП ООО "MyBazar" - 2020. @lang('footer.all_rights_reserved')</p>
</footer>