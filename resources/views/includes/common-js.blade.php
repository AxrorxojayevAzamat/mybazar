<script src="{{asset('js/jquery-3.4.1.slim.min.js')}}" ></script>
<script>
    $(document).ready(function() {
        $(".wrapper-loader").fadeOut("slow");
    })
</script>
<script src="{{asset('js/mmenu.js')}}"></script>
<script src="{{asset('js/mmenu-index.js')}}"></script>
<script src="{{asset('js/popper1.16.min.js')}}"></script>
<script src="{{asset('js/jquery-2.2.0.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/header-414.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootnavbar.js')}}" ></script>
<script src="{{asset('js/search-bar.js')}}"></script>   
<script src="{{asset('js/scroll-xNav.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
@yield ('script')