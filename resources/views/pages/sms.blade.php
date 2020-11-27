@extends('layouts.app')

@section('title', 'SMS page')

@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('css/auth.css')}}"> --}}
@endsection

@section('body')
    <!--auth body  -->
    <section>
        <div class="h4-title pay-body">
            <h4 class="title">@lang('frontend.pages.login_or_register')</h4>
        </div>
        <div class="outter-resend-sms">
            <div class="inner">
                <form action="">
                    <div class="phone-number">
                        <label for="phone-number">@lang('frontend.pages.enter_code_from_sms')</label>
                        <div class="input">
                            <input type="tel" id="phone-number" class="form-control bordered-input"  required placeholder="" >
                        </div>
                    </div>
                    <input class="resend-sms" type="submit" id="submit" value="@lang('frontend.pages.send_again_after_59_sec')">
                </form>
                <a href="#">@lang('frontend.pages.login_by_password')</a>
            </div>
        </div>

    </section>
@endsection


@section('script')
    <script src="{{mix('js/1-index.js', 'build')}}"></script>
@endsection
