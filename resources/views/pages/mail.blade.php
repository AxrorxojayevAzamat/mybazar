@extends('layouts.app')

@section('title', trans('frontend.title.mail_page'))

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
                    <div class="phone-number mail-phone-number">
                        <label for="phone-number">@lang('frontend.pages.phone_num_or_email')</label>
                        <div class="input">
                            <input type="tel" id="phone-number" class="form-control bordered-input"  required placeholder="@lang('frontend.pages.phone_num_or_email')" >
                        </div>
                        <div class="oneline-label">
                            <label for="phone-number">@lang('frontend.pages.password')</label>
                            <label for="forget-password" class="forget-password">@lang('frontend.pages.forgot_passwoed')</label>
                        </div>
                        <div class="input">
                            <input type="tel" id="phone-number" class="@lang('frontend.pages.password')" >
                        </div>
                    </div>
                    <div class="enter">
                        <input type="submit" id="submit" value="@lang('frontend.pages.enter')Вход">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="exampleCheck1">@lang('frontend.pages.remember')</label>
                        </div>
                    </div>
                    <div class="login_by_password">
                        <a href="#">@lang('frontend.pages.login_by_password')</a>
                    </div>
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
        </div>
    </section>
@endsection
