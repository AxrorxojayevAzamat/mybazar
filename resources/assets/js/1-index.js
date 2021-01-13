$(window).on("load, resize", function () {
    var viewportWidth = $(window).width();
    if (viewportWidth < 1200) {
        $(".all-filtered-items").addClass("column");
    } else {
        $(".all-filtered-items").removeClass("column");
    }
});

$(document).ready(function () {

    // date picker
    var date_input = $('input[name="date"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options);


    checkCart();

    // CART FUNCTIONS
    function checkCart() {
        let cart_product = localStorage.getItem('product_id');
        cart_product = JSON.parse(cart_product);
        let counter = 0;
        if (cart_product) {
            counter = cart_product.length;
        }
        let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
        XMLHttpRequest.prototype.send = function (data) {
            this.setRequestHeader('X-CSRF-Token', token);
            return send.apply(this, arguments);
        };
        if (cart_product !== null) {
            $.ajax({
                url: '/add-cart',
                method: 'POST',
                data: cart_product,
                dataType: 'json',
                success: function (data) {
                    if (data.message === 'success') {
                        localStorage.removeItem('product_id');
                        console.log(data.message);

                    } else {
                        $('.mbcart span').addClass('counter');
                        $('.counter').html(counter);
                        console.log(data.message);
                    }
                }
            });

        } else {
            return false;
        }
    }

    function writeProductsId() {
        let cart_products_id = $('.cart_products_id');
        let saved_carts = localStorage.getItem('product_id');
        if (saved_carts !== null) {
            let values = '';
            console.log(saved_carts);
            cart_products_id.val(saved_carts);
        } else {
            console.log('error');
        }

    }

    writeProductsId();


    $("#dropdownComparison").on("click", function () {
        $(".compare-items").fadeIn().addClass('in');

    });
    $("#dropdownCart").on("click", function () {
        $(".cart-items").fadeIn().addClass('in');
    });

    // click outside compare items
    $('body').on('click', function (event) {
        if (!(event.target.id == 'dropdownComparison' || event.target.id == 'compareItems' || $(event.target).parents('#compareItems').length)) {

            if ($("#compareItems").hasClass('in')) {
                $("#compareItems").fadeOut().removeClass('in');
            }
        }
        if (!(event.target.id == 'dropdownCart' || event.target.id == 'cartItems' || $(event.target).parents('#cartItems').length)) {

            if ($("#cartItems").hasClass('in')) {
                $("#cartItems").fadeOut().removeClass('in');
            }
        }
        // dropdown delete button
        if ($(event.target).hasClass('delete-btn')) {
            $(event.target).parent('.item').remove();
        }
    });

    // main search select
    $('.select-main-search').niceSelect();

    // edit profile info's select
    $('#gender').niceSelect();

    // display filter items with <a> tag and show-more btn
    var showDefault = 5;
    var text = ['Скрыть', 'Показать еще'];
    $('.panel .custom-control').each(function () {
        var item = $(this).find('a');

        if (item.length > showDefault) {
            //show only 5 items
            for (var i = 0; i < showDefault; i++) {
                $(item[i]).show().addClass('show');
            }
            //if items more than 5, then insert button show-more
            var btn = $("<div>", {
                text: text[1],
                "class": "btn show-more",
                click: function () {
                    item.not('.show').stop().slideToggle(500, function () {
                        btn.text(text[+$(this).is(":hidden")])
                    })
                }
            }).appendTo(this)
        } else {
            $(item).show();
        }
    });

    // display filter items with checkbox tag and show-more btn
    $('.panel').each(function () {
        var item = $(this).find('.custom-control');

        if (item.length > showDefault) {
            //show only 5 items
            for (var i = 0; i < showDefault; i++) {
                $(item[i]).show().addClass('show');
            }
            //if items more than 5, then insert button show-more
            var btn = $("<div>", {
                text: text[1],
                "class": "btn show-more",
                click: function () {
                    item.not('.show').stop().slideToggle(500, function () {
                        btn.text(text[+$(this).is(":hidden")])
                    })
                }
            }).appendTo(this)
        } else {
            $(item).show();
            $('.show-more').hide();

        }
    });

    // выбрать все в фильтре чекбокс
    $('.big-filter-with-title-checkbox div input.checkAll').on('click', function () {
        if ($(this).is(':checked')) {
            $(this).parent().find('.custom-control input[type="checkbox"]').prop('checked', 'checked');
        } else {
            $(this).parent().find('.custom-control input[type="checkbox"]').prop('checked', '');
        }
    });

    var acc = document.getElementsByClassName("accordion_filter");
    var title_with_checkbox = document.getElementsByClassName("checkAll-label");
    for (var i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            var panel = this.nextElementSibling;
            console.log(panel)
            if (this.classList.contains('active')) {
                $(panel).slideUp();
            } else {
                $(panel).slideDown();
            }
            this.classList.toggle("active");
        });
    }

    for (var i = 0; i < title_with_checkbox.length; i++) {
        title_with_checkbox[i].addEventListener("click", function () {
            var panel = this.nextElementSibling;
            if (this.classList.contains('active')) {
                $(panel).slideUp();
            } else {
                $(panel).slideDown();
            }
            this.classList.toggle("active");
        });
    }

// весь каталог 2 банера
    $('.d2').hover(
        function () {
            // When hover the #slide_img img hide the div.shadow
            // $('li.full-image-banner').hide();
        }, function () {
            // When out of hover the #slide_img img show the div.shadow
            // $('li.full-image-banner').show();
        }
    );
    $('#main_navbar .collapse ul.navbar-nav li.dropdown-main ul.all-dropdowns li').each(function () {
        if ($(this).find('ul.d2').length > 0) {
            $(this).find('.first-dropdown').append('<i class="mbgotoresults_searchresulticon" style="position:absolute; top:40%; right:4%; font-size:12px"></i>');

            $('#main_navbar .collapse ul.navbar-nav li.dropdown-main ul.all-dropdowns li ul.d2 li').each(function () {
                if ($(this).find('ul').length > 0) {
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
        margin: 10,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1,
                dots: false,
                nav: true
            },
            600: {
                items: 2,
                dots: false,
                nav: true
            },
            800: {
                items: 3,
                dots: false,
                nav: true
            },
            1001: {
                items: 2
            },
            1251: {
                items: 2
            },
            1400: {
                items: 3
            },
            2500: {
                items: 4
            }

        }
    });
    $('.several-images').owlCarousel({
        margin: 10,
        nav: true,
        dots: false,
        navRewind: false,
        loop: false,
        responsive: {
            0: {
                items: 2,
                nav: true
            },
            600: {
                items: 3,
                nav: true
            },
            800: {
                items: 4,
                nav: true
            },
            1001: {
                items: 5,
                nav: true
            },
            1251: {
                items: 6,
            }
        }
    });
    $('.products').owlCarousel({
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            800: {
                items: 2
            },
            1000: {
                items: 3
            },
            1251: {
                items: 3
            },
            1400: {
                items: 4
            },
            2000: {
                items: 5
            }

        }
    });
    $('.similar-p').owlCarousel({
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            800: {
                items: 3
            },
            1100: {
                items: 4
            },
            1251: {
                items: 5
            },
            1400: {
                items: 6
            }
        }
    });
    $('.one-row-brands').owlCarousel({
        nav: true,
        margin: 10,
        items: 12,
        dots: false,
        responsive: {
            0: {
                items: 3
            },
            300: {
                items: 3
            },
            400: {
                items: 4
            },
            500: {
                items: 5,
            },
            600: {
                items: 6,
            },
            700: {
                items: 7,
            },
            800: {
                items: 8,
            },
            1001: {
                items: 12,
            },
            1251: {
                items: 14
            },
            1400: {
                items: 15
            },
            1600: {
                items: 16
            },
            1800: {
                items: 18
            }
        }
    });
    $('.shops-fr').owlCarousel({
        nav: false,
        dots: false,
        margin: 20,
        items: 3,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            800: {
                items: 2,
                nav: true
            },
            1251: {
                items: 2,
                nav: true
            },
            1400: {
                items: 3,
                nav: true
            }
        }
    });
    $('.shops-2r-inner').owlCarousel({
        nav: false,
        dots: false,
        // autoWidth:true,
        margin: 0,
        items: 3,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            601: {
                items: 2,
                nav: true
            },
            900: {
                items: 2,
                nav: true
            },
            1400: {
                items: 4,
                nav: true
            },
            2000: {
                items: 5,
                nav: true
            }
        }
    });
    $('.all-players').owlCarousel({
        nav: false,
        dots: true,
        margin: 20,
        items: 3,
        responsive: {
            0: {
                items: 1,
                dots: false,
                nav: true
            },
            600: {
                items: 1,
                dots: false,
                nav: true
            },
            800: {
                items: 2,
                dots: false,
                nav: true
            },
            1001: {
                items: 2
            },
            1251: {
                items: 2
            },
            1400: {
                items: 3
            }
            ,
            2000: {
                items: 4
            }
        }
    });
    $('.outter-blogs').owlCarousel({
        nav: false,
        dots: true,
        items: 3,
        responsive: {
            0: {
                items: 1,
                dots: false,
                nav: true
            },
            600: {
                items: 1,
                dots: false,
                nav: true
            },
            800: {
                items: 2,
                dots: false,
                nav: true
            },
            1001: {
                items: 2
            },
            1251: {
                items: 2
            },
            1400: {
                items: 3
            },
            2500: {
                items: 4
            }
        }
    });

    $('.hot-news').owlCarousel({
        items: 1,
        autoplay: true,
        autoplayHoverPause: true,
        loop: true,
        dots: false,
        nav: false
    });

    // add to wishlist script

    let wishlist_count = 0;
    $.ajax({
        url: '/count-favorite',
        method: 'GET',
        success: function (data) {
            wishlist_count = data.products.count;
        },
        error: function(e) {
            throw new Error(e.message)
        }
    });
    $("div.like").click(function (event) {
        if ($(this).hasClass("selected_like")) {
            wishlist_count--;
            $("a.wish-list > i > span.counter").text(wishlist_count);
            $(this).removeClass('selected_like');
        } else {
            $(this).addClass('selected_like');
            wishlist_count++;
            setTimeout(function () {
                $("a.wish-list > i > span").addClass("counter");
                $("a.wish-list > i > span.counter").text(wishlist_count);
            }, 100);
        }
        event.preventDefault();
    });

    // add to cart script
    var cart_count = 0;
    $("div.cart").click(function (event) {
        $(this).addClass('selected_cart');
        cart_count += 1;
        setTimeout(function () {
            $("a#dropdownCart > i > span").addClass("counter");
            $("a#dropdownCart > i > span.counter").text(cart_count);
        }, 100);
        event.preventDefault();
    });


    // add to compare script
    var compare_count = 0;
    $("div.libra").click(function (event) {
        if (localStorage.getItem('compare_product').split(',').length <= 3) {
            $(this).addClass('selected_libra');
        }
        compare_count += 1;
        setTimeout(function () {
            $("a#dropdownComparison > i > span").addClass("counter");
            $("a#dropdownComparison > i > span.counter").text(compare_count);
        }, 100);
        event.preventDefault();
    });

    // show nav on scroll
    var prev = 0;
    var $window = $(window);
    var navBig = $('.navbar-1560');
    var navDropdown = $('.dropdown-menu');
    $window.on('scroll', function () {
        var scrollTop = $window.scrollTop();
        if (scrollTop >= 60) {
            navBig.addClass('shadow');
        } else {
            navBig.removeClass('shadow');
        }
        // $(".compare-items").fadeOut("fast");
        // $(".cart-items").fadeOut("fast");
        navBig.toggleClass('hidden', scrollTop > prev);
        navDropdown.removeClass('show');
        prev = scrollTop;
    });

});






