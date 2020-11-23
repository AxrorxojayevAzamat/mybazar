$('.header').on('click', '.search-toggle', function (e) {
    var selector = $(this).data('selector');

    $(selector).toggleClass('show').find('.search-input').focus();
    $(this).toggleClass('active');

    e.preventDefault();
});

$(document).ready(function () {

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
            url: 'api/search',
            method: 'GET',
            data: data,
            dataType: 'json',
            success: function (data) {
                droping.show();
                let dropData = '';
                for (let i = 0; i < data.brands.data.length; i++) {
                    if (data.brands.data[i].name !== undefined) {
                        dropData += `<div>${data.brands.data[i].name}</div>`;
                    }
                    console.log(dropData);
                }
                for (let i = 0; i < data.products.data.length; i++) {
                    dropData += `<div>${data.products.data[i].name}</div>`;
                }
                for (let i = 0; i < data.stores.data.length; i++) {
                    dropData += `<div>${data.stores.data[i].name}</div>`;
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
    cart.click(function () {
        console.log('click');
        $.ajax({
            url: 'api/cart',
            method: 'GET',
            success: function (data) {
                let body_cart = '';
                for (let i = 0; i < data.products.length; i++){
                    body_cart += `<a class='dropdown-item animated fadeInDown' href="#">
                        <div class='product-img'>
                        <img src="{{asset('images/popular1.png')}}">
                        </div>
                        <div class='description'>
                            <h5 class='title'>${data.products[i].name_uz}</h5>
                            <p class='price'>${data.products[i].price_uzs}</p>
                        </div>
                        <button class="btn delete-btn" data-name=''><i class="mbexit_mobile"></i>
                        </button>
                    </a>`;
                }


                $('#card_body').html(body_cart);
                console.log(data);
            }, error: function (data) {
                console.log(data);
            }
        })
    })
});
