$(document).ready(function(){
    
    $(function () {
        $('#main_navbar').bootnavbar({
            //option
            //animation: false
        });
    })
    $('.d2').hover(
        function(){
            // When hover the #slide_img img hide the div.shadow
            $('li.full-image-banner').hide();
        },function(){
            // When out of hover the #slide_img img show the div.shadow
            $('li.full-image-banner').show();
        }
    );

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
                items:2,
            },
            1251:{
                items:3
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

