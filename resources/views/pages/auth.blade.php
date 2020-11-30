@extends('layouts.app')

@section('title', trans('frontend.title.auth_page'))

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/auth.css')}}"> --}}
@endsection

@section('body')
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">@lang('frontend.pages.login_or_register')</h4>
        </div>
        <div class="outter-sign-reg">
            <div class="inner-sign-reg">
                <form action="">
                    <div class="phone-number">
                        <label for="phone-number">@lang('frontend.pages.by_num_phone')</label>
                        <div class="input">
                            <input type="tel" id="phone-number" class="form-control bordered-input"  required placeholder="" >
                        </div>
                    </div>
                    <input type="submit" id="submit" value="@lang('frontend.pages.get_sms_code')">
                </form>
                <div class="sign-in-through">
                    <label for="social-accounts">@lang('frontend.pages.login_by')</label>
                    <div class="social-app-icons" id="social-accounts">
                        <i class="mbfacebook"></i>
                        <i class="mbtwitter"></i>
                        <!-- <i class=""></i> -->
                        <i class="mbvkontakte"></i>
                        <!-- <i class=""></i> -->
                    </div>
                </div>
            </div>
            <a href="#">@lang('frontend.pages.login_by_password')</a>
        </div>
    </section>
@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection
