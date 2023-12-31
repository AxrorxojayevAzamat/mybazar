@extends('layouts.admin.master')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', 'login-page')

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )
@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ $dashboard_url }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ trans('adminlte.login_message') }}</p>
                <form action="{{ $login_url }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input name="email_or_phone" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{ trans
                        ('auth.email_phone_or_username') }}" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="{{ trans('adminlte.password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">{{ trans('adminlte.remember_me') }}</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                {{ trans('adminlte.sign_in') }}
                            </button>
                        </div>
                    </div>
                </form>

                <p class="mt-2 mb-1">
                    <a href="{{ route('password.reset.request') }}">
                        {{ trans('adminlte.i_forgot_my_password') }}
                    </a>
                </p>
                @if ($register_url)
                    <p class="mb-0">
                        <a href="{{ route('register') }}">
                            {{ trans('adminlte.register_a_new_membership') }}
                        </a>
                    </p>
                @endif

                <div class="col-md-12" style="margin-top: 10px">
                    <div class="card">
                        <div class="card-header">@lang('auth.auth_by_network')</div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{ route('login.network', ['network' => 'facebook']) }}"><i class="fa fa-facebook-square"></i>Facebook</a>
                                </li>
                                <li>
                                    <a href="{{ route('login.network', ['network' => 'google']) }}"><i class="fa fa-google-plus-square"></i>Google</a>
                                </li>
                                <li>
                                    <a href="{{ route('login.network', ['network' => 'telegram']) }}"><i class="fa fa-telegram-plane"></i>Telegram</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
{{--    {!! Socialite::driver('telegram')->getScript() !!}--}}
{{--    <script async src="https://telegram.org/js/telegram-widget.js?14" data-telegram-login="uzmybazaar_bot" data-size="medium" data-auth-url="https://d732d8bf76bc.ngrok.io/login/telegram/callback" data-request-access="write"></script>--}}
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
{{--    <script>--}}
{{--        $(document).ready(function (e) {--}}

{{--        });--}}
{{--    </script>--}}

    @stack('js')
    @yield('js')
@stop
