<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/jquery-3.4.1.slim.min.js')}}"></script>

    <title> @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate-3.7.2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mybazar-fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css', 'build') }}">
    <link rel="stylesheet" href="{{asset('css/jquery.rateyo.css')}}">
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
        @include('partials.flash')
        @yield('body')

    <!-- NEWS LETTER -->
        <section>
            <div class="news-letter">
                <div class="text">
                    <h5 class="title">@lang('footer.subscribe_news')</h5>
                    <p class="description">@lang('footer.leave_mail_phone_number')</p>
                </div>
                <form class="email-form">
                    <input type="text" id="news-letter-mail-phone" placeholder="@lang('footer.mail_phone_number')">
                    <button type="submit" class="btn-follow bold">@lang('footer.subscribe')</button>
                </form>
            </div>
        </section>

        <!-- FOOTER -->
        @include ('partials.footer')
    </div>
</div>

<script>
    $(document).ready(function () {
        function deleteFromCompare(id){
            let elem = localStorage.getItem('compare_product');
            console.log(elem)
        }
        $('#compareCard').on('click',function (){
            $.ajax({
                url: '{{ route('getCompare')}}' + '?data='+localStorage.getItem('compare_product'),
                method: 'GET',
                dataType:'json',
                success: function (data){
                    element = '';
                    let origin = window.location.origin;
                    for (let i = 0; i < data.data.length; i++) {
                        element +='<li class="item" >'+
                            '<div class="product-img">'+
                            ' <a href="products/show/'+ data.data[i].id + '">'+'<img src="'+origin + data.data[i].main_photo + '"></a>'+
                            '</div>'+
                            ' <div class="description">'+
                            '<a href="products/show/' + data.data[i].id + '">'+'<h5 class="title">'+ data.data[i].name + '</h5></a>'+
                            '<p class="price">'+ data.data[i].price_uzs +'</p>'+
                            '</div>'+
                            '<button class="btn delete-btn" onclick="deleteFromCompare(' + data.data[i].id + ')" >'+'<i class="mbexit_mobile">'+'</i></button>'
                            +'</li>';
                    }
                   $('#compareSuccessItems').html(element);
                },error: function (data){
                    console.log(data);
                }
            })
        });


        $(".wrapper-loader").fadeOut("slow");
    })
    let a = document.querySelectorAll("img");
    a.forEach((img)=>{img.setAttribute('src', img.src.replace("localhost:5500", "shop.sec.uz"))});
</script>
<script src="{{ asset('js/mmenu.js') }}"></script>
<script src="{{asset('js/mmenu-index.js')}}"></script>
<script src="{{asset('js/popper1.16.min.js')}}"></script>
<script src="{{asset('js/jquery-2.2.0.min.js')}}" type="text/javascript"></script>
<script src="{{mix('js/header-414.js', 'build')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootnavbar.js')}}"></script>
<script src="{{mix('js/search-bar.js', 'build')}}"></script>
<script src="{{asset('js/scroll-xNav.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery.rateyo.js')}}"></script>

@yield ('script')
@stack('script')


</body>
</html>
