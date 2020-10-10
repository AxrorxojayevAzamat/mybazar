<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate-3.7.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mybazar-fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css', 'build') }}">
    @yield('styles')

</head>
<body>
    <!-- page loader -->
    <div class="wrapper-loader">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <div id="page">
    @include('partials.414.menu')
    @include('partials.414.header')

    <!-- FULL CONTENT BODY -->
        <div class="content container-fluid">
            <!-- All headers 1560 -->
            <section class="navbar-1560">
                @include('partials.top-header')
                @include('partials.main-header')
                @include('partials.nav-header')
            </section>

            @yield('banner')

            <nav aria-label="breadcrumb">
                <div class="breadcrumb-item">
                    @section('breadcrumbs', Breadcrumbs::render())
                    @yield('breadcrumbs')
                </div>
            </nav>
            @yield('body')

        <!-- NEWS LETTER -->
            <section>
                <div class="news-letter">
                    <div class="text">
                        <h5 class="title">Подписаться на новости</h5>
                        <p class="description">Оставьте свою эл. почту или телефон номер и будьте в курсе с последними новостями
                        </p>
                    </div>
                    <form class="email-form">
                        <input type="text" id="news-letter-mail-phone" placeholder="Адрес эл.почты или номер телефона">
                        <button type="submit" class="btn-follow bold">Подписаться</button>
                    </form>
                </div>
            </section>

            <!-- FOOTER -->
            @include ('partials.footer')
        </div>
    </div>

    <script src="{{asset('js/jquery-3.4.1.slim.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(".wrapper-loader").fadeOut("slow");
        })
    </script>
    <script src="{{asset('js/mmenu.js')}}"></script>
    <script src="{{asset('js/mmenu-index.js')}}"></script>
    <script src="{{asset('js/popper1.16.min.js')}}"></script>
    <script src="{{asset('js/jquery-2.2.0.min.js')}}" type="text/javascript"></script>
    {{--<script src="{{asset('js/header-414.js')}}"></script>--}}
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootnavbar.js')}}" ></script>
    <script src="{{asset('js/search-bar.js')}}"></script>
    <script src="{{asset('js/scroll-xNav.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    @yield ('script')
    @stack('script')


</body>
</html>
