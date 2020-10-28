$(document).ready(function(){
    
    $('.big-filter-with-title-checkbox div input.checkAll').on('click',function(){
        if($(this).is(':checked')){
           $(this).parent().find('.custom-control input[type="checkbox"]').prop('checked','checked');
        }else{        
            $(this).parent().find('.custom-control input[type="checkbox"]').prop('checked','');
        }
    });
    var acc = document.getElementsByClassName("accordion");
    var title_with_checkbox=document.getElementsByClassName("checkAll-label");
    for (var i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            var panel = this.nextElementSibling;
            if(this.classList.contains('active')){
                $(panel).slideUp();
            }
            else{
                $(panel).slideDown();
            }
            this.classList.toggle("active");
        });
    }
    for (var i = 0; i < title_with_checkbox.length; i++) {
        title_with_checkbox[i].addEventListener("click", function() {
        var panel = this.nextElementSibling;
        if(this.classList.contains('active')){
            $(panel).slideUp();
        }
        else{
            $(panel).slideDown();
        }
        this.classList.toggle("active");
        });
    }


    $('.d2').hover(
        function(){
            // When hover the #slide_img img hide the div.shadow
            // $('li.full-image-banner').hide();
        },function(){
            // When out of hover the #slide_img img show the div.shadow
            // $('li.full-image-banner').show();
        }
    );
    $('#main_navbar .collapse ul.navbar-nav li.dropdown-main ul.all-dropdowns li').each(function(){
        if($(this).find('ul.d2').length>0){
            $(this).find('.first-dropdown').append('<i class="mbgotoresults_searchresulticon" style="position:absolute; top:40%; right:4%; font-size:12px"></i>');

            $('#main_navbar .collapse ul.navbar-nav li.dropdown-main ul.all-dropdowns li ul.d2 li').each(function(){
                if($(this).find('ul').length>0){
                    $(this).find('.dropdown-toggle').append('<i class="mbgotoresults_searchresulticon" style="position:absolute; top:40%; right:4%; font-size:12px"></i>');
                    
                }
            });
        }
    })

    $(function () {
        $('#main_navbar').bootnavbar({
            //option
            //animation: false
        });
    })

    $('.products-of-day').owlCarousel({
        margin:10,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            800:{
                items:1,
            },
            1001:{
                nav:true,
                items:2,
            },
            1251:{
                items:3
            }
        }
    });
    $('.several-images').owlCarousel({
        margin:10,
        nav:true,
        dots:false,
        navRewind: false,
        loop:false,
        responsive:{
            0:{
                items:2,
                nav:true
            },
            600:{
                items:3,
                nav:true
            },
            800:{
                items:4,
                nav:true
            },
            1001:{
                items:5,
                nav:true
            },
            1251:{
                items:6,
            }
        }
    });
    $('.products').owlCarousel({
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            800:{
                items:2
            },
            1000:{
                items:3
            },
            1251:{
                items:3
            },
            1400:{
                items:4
            }
        }
    });
    $('.similar-p').owlCarousel({
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:4
            },
            800:{
                items:5
            },
            1000:{
                items:5
            },
            1251:{
                items:6
            },
            1400:{
                items:6
            }
        }
    });
    $('.one-row-brands').owlCarousel({
        nav:true,
        margin:10,
        items:12,
        dots:false,
        responsive:{
            0:{
                items:2
            },
            300:{
                items:2
            },
            400:{
                items:2
            },
            500:{
                items:3,
            },
            600:{
                items:4,
            },
            700:{
                items:5,
            },
            800:{
                items:6,
            },
            1001:{
                items:10,
            },
            1251:{
                items:12
            }
        }
    });
    $('.shops-fr').owlCarousel({
        nav:false,
        dots:false,
        margin:20,
        items:3,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:1,
                nav:true
            },
            800:{
                items:2,
                nav:true
            },
            1251:{
                items:2,
                nav:true
            },
            1400:{
                items:3,
                nav:true
            }
        }
    });
    $('.shops-2r-inner').owlCarousel({
        nav:false,
        dots:false,
        // autoWidth:true,
        margin:0,
        items:3,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            400:{
                items:2,
                nav:true
            },
            525:{
                items:2,
                nav:true
            },
            601:{
                items:1,
                nav:true
            },
            800:{
                items:1,
                nav:true
            },
            900:{
                items:2,
                nav:true
            },
            1251:{
                items:3,
                nav:true
            },
            1400:{
                items:4,
                nav:true
            }
        }
    });
    $('.all-players').owlCarousel({
        nav:false,
        dots:false,
        margin:20,
        items:3,
        responsive:{
            0:{
                items:1,
                dots:true
            },
            600:{
                items:1,
                dots:true
            },
            800:{
                items:2,
                dots:true
            },
            1251:{
                items:2,
                dots:true
            },
            1400:{
                items:3,
                dots:false
            }
        }
    });
    $('.outter-blogs').owlCarousel({
        nav:false,
        dots:false,
        items:3,
        responsive:{
            0:{
                items:1,
                dots:true
            },
            600:{
                items:1,
                dots:true
            },
            800:{
                items:2,
                dots:true
            },
            1251:{
                items:2,
                dots:true
            },
            1400:{
                items:3,
                dots:false
            }
        }
    });

    $('.hot-news').owlCarousel({
        items:1,
        autoplay:true,
        autoplayHoverPause:true,
        loop:true,
        dots:false,
        nav:false
    });

    // add to wishlist script
    var wishlist_count = 0;
    $("div.like").click(function(event) {
        if($(this).hasClass("selected_like")){
            wishlist_count-=1;
            $("a.wish-list > i > span.counter").text(wishlist_count);
            $(this).removeClass('selected_like');
        } else{
            $(this).addClass('selected_like');
            wishlist_count+=1;
            setTimeout(function() {
                $("a.wish-list > i > span").addClass("counter");
                $("a.wish-list > i > span.counter").text(wishlist_count);
            }, 100);
        }
        event.preventDefault();
    });

    // add to cart script
    var cart_count = 0;
    $("div.cart").click(function(event) {
        $(this).addClass('selected_cart');
        cart_count+=1;
            setTimeout(function() {
                $("a.cart > i > span").addClass("counter");
                $("a.cart > i > span.counter").text(cart_count);
            }, 100);
        event.preventDefault();
    });

    // cart dropdown delete button
    $('.cart-dropdown .dropdown-menu .selected-items a').on("click", ".delete-btn", function(event){
        this.parentNode.remove();
    });

    // compare dropdown delete button
    $('.compare-dropdown .dropdown-menu .selected-items a').on("click", ".delete-btn", function(event){
        this.parentNode.remove();
    });



    // add to compare script
    var compare_count = 0;
    $("div.libra").click(function(event) {
        $(this).addClass('selected_libra');
        compare_count+=1;
            setTimeout(function() {
                $("a.comparison > i > span").addClass("counter");
                $("a.comparison > i > span.counter").text(compare_count);
            }, 100);
        event.preventDefault();
    });

    // show nav on scroll
    var prev=0;
    var $window= $(window);
    var navBig= $('.navbar-1560');
    var navDropdown=$('.dropdown-menu');
    $window.on('scroll', function(){
        var scrollTop = $window.scrollTop();
        if (scrollTop >= 60) {   
            navBig.addClass('shadow'); 
        }else{  
            navBig.removeClass('shadow'); 
        }
        navBig.toggleClass('hidden', scrollTop > prev);
        navDropdown.removeClass('show');
        prev= scrollTop;
    });
    
});


