$('.header').on('click', '.search-toggle', function (e) {
    var selector = $(this).data('selector');

    $(selector).toggleClass('show').find('.search-input').focus();
    $(this).toggleClass('active');

    e.preventDefault();
});

$(document).ready(function () {
    $('#cart_none').hide();
    let droping = $('#droping');
    let cart = $('#dropdownCart');
    droping.hide();
    let searchInput = $('#search-input');

    searchInput.keyup(function (e) {
        e.preventDefault();

        let inputValue = searchInput.val();

        let data = {};
        data.search = inputValue;

        $.ajax({
            url: '/api/search',
            method: 'GET',
            data: data,
            dataType: 'json',
            success: function (data) {
                droping.show();
                let dropData = '';
                dropData += `
                        <a href="#">
                            <div class="item with-icon">
                                <i class="mbsearch_resulticon"></i>
                                <h6 class="title">${inputValue}</h6>
                                <i class="mbgotoresults_searchresulticon"></i>
                            </div>
                        </a>
                `;
                for (let i = 0; i < data.brands.data.length; i++) {
                    if (data.brands.data[i].name !== undefined) {
                        dropData += `
                        <a href="http://localhost:5500/brands/${data.brands.data[i].id}">
                            <div class="item brand">
                                <div class="image">
                                    <img src="${data.brands.data[i].logo}" alt="">
                                </div>
                                <div class="description">
                                    <h6 class="title">${data.brands.data[i].name}</h6>
                                    <p class="sub-title brand">Бренд</p>
                                </div>
                                <i class="mbgotoresults_searchresulticon"></i>
                            </div>
                        </a>`;
                    }
                    console.log(dropData);
                }
                for (let i = 0; i < data.products.data.length; i++) {
                    dropData += `<a href="#">
                                    <div class="item product">
                                        <div class="image">
                                            <img src="{{asset('images/mi_brand.png')}}" alt="">
                                        </div>
                                        <div class="description">
                                            <h6 class="title">${data.products.data[i].name}</h6>
                                            <p class="sub-title price">${data.products.data[i].price_uzs} <span>сум</span></p>
                                        </div>
                                        <i class="mbgotoresults_searchresulticon"></i>
                                    </div>
                                </a>`;
                }

                $('#droping').html(dropData);


                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        })
        console.log(inputValue);
    });

    function link(data) {
        console.log(data)
    }
    cart.click(function (e) {
        console.log('loging')
        e.preventDefault();
        let cart_product = localStorage.getItem('product_id');
        if (cart_product !== null || cart_product == '') {
            console.log(cart_product);
            let cart_product_check = cart_product.split(',');
            for (let i = 0; i <= cart_product_check.length; i++) {
                if (cart_product_check[i] == '') {
                    cart_product_check.splice(i, 1);
                } else {
                    continue;
                }
            }
            let data = {};
            data.product_id = [];
            data.product_id = cart_product_check;

            $.ajax({
                url: '/cart-header',
                method: 'GET',
                data: data,
                dataType: 'json',
                success: function (data) {
                    $('#goToCart').show();
                    $('#cart_none').hide();
                    $('#card_body').show();
                    let body_cart = '';
                    console.log(data.data.length);
                    let origin = window.location.origin;
                    for (let i = 0; i < data.data.length; i++) {
                        body_cart += '<li class="item" id="header'+ data.data[i].id + '" ><div class="product-img"><a href="#">' +
                            '<img src="'+ origin + data.data[i].main_photo +'"></a></div><div class="description">' +
                            '<a href="/products/show/' + data.data[i].id + '"><h5 class="title">' + data.data[i].name + '</h5></a>' +
                            '<p class="price">' + data.data[i].price_uzs + '</p> </div> ' +
                            '<button class="btn delete-btn" onclick="removing(' + data.data[i].id + ')">' +
                            '<i class="mbexit_mobile"></i></button> </li>';
                    }


                    $('#card_body').html(body_cart);
                    console.log(data);
                }, error: function (data) {
                    console.log(data);
                }
            });
        }else{
            $.ajax({
                url: '/cart-header',
                method: 'GET',
                success: function (data) {
                    let body_cart = '';
                    console.log(data.data)
                    if (data.data == 'error' || data.data.length == 0){
                        $('#goToCart').hide();
                        $('#cart_none').show();
                        $('#card_body').hide();
                    }
                    else{
                        $('#goToCart').show();
                        $('#cart_none').hide();
                        $('#card_body').show();
                        console.log(data.data.length);
                        let origin = window.location.origin;
                        for (let i = 0; i < data.data.length; i++) {
                            body_cart += '<li class="item" id="header'+ data.data[i].id + '" ><div class="product-img"><a href="#">' +
                                '<img src="' + origin + data.data[i].main_photo + '"></a></div><div class="description">' +
                                '<a href="/products/show/' + data.data[i].id + '"><h5 class="title">' + data.data[i].name + '</h5></a>' +
                                '<p class="price">' + data.data[i].price_uzs + '</p> </div> ' +
                                '<button class="btn delete-btn" onclick="removing(' + data.data[i].id + ')">' +
                                '<i class="mbexit_mobile"></i></button> </li>';
                        }
                    }
                    $('#card_body').html(body_cart);
                    console.log(data);
                }, error: function (data) {
                    console.log(data);
                }
            });
        }
    });
    function removing(id){

    }




    // $('#goToCart').submit(function (){
    //     console.log('submit');
    // })


});
