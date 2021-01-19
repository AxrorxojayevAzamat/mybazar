$(document).ready(function () {
    $('.cart').click(function (e) {
        e.preventDefault();
        let product = $(this);
        let product_id = product.data('id').slice(1);
        console.log(product_id)
        let modification_id = $("#productModification" + product_id).val();
        addCart(product_id, modification_id);
    });
});


function addCart(id, modificationId) {
    let product_id = {};
    product_id.product_id = id;
    if (modificationId && modificationId !== '') {
        product_id.modification_id = modificationId;
    }

    $.ajax({
        url: '/add-cart',
        method: 'POST',
        data: product_id,
        dataType: 'json',
        success: function (data) {

            if (data.message === 'success') {
                localStorage.removeItem('product_id');
                let containerCounter = $('#counterCartRed');
                let counterCartNumber = $('#counterCartItems').val();
                counterCartNumber = parseInt(counterCartNumber, 10);
                console.log(typeof counterCartNumber);
                counterCartNumber += 1;
                containerCounter.text(counterCartNumber);
                $('#counterCartItems').val(counterCartNumber);
            } else if (data.message === 'exists') {
                removeCartList(product_id);
            } else {
                nonRegisteredUsersCart(product_id);
                console.log('isnotexists');
            }
        }, error: function (data) {

        }
    });

}

function nonRegisteredUsersCart(cartProduct) {
    console.log(cartProduct);
    if (localStorage.getItem('product_id')) {
        let cart_products = '';
        let exist = false;
        let product_id = localStorage.getItem('product_id');
        console.log(product_id);
        product_id = JSON.parse(product_id);
        console.log(product_id);
        for (let i = 0; i < product_id.length; i++) {
            if (product_id[i].product_id === cartProduct.product_id) {
                exist = true;
            } else {
                console.log('loging');
            }
        }

        if (!exist) {
            product_id.push(cartProduct);
            let containerCounter = $('.counter');
            localStorage.setItem('product_id', JSON.stringify(product_id));
            containerCounter.text(product_id.length);
        } else {
            removeCartList(cartProduct);
            console.log('exist');
        }
    } else {
        let storageItems = [];
        storageItems[0] = cartProduct;
        localStorage.setItem('product_id', JSON.stringify(storageItems));
    }
}

function removeCartList(cartProduct) {
    $.ajax({
        url: '/remove-cart',
        method: 'POST',
        data: cartProduct,
        dataType: 'json',
        success: function (data) {
            if (data.data == 'success') {
                let containerCounter = $('#counterCartRed');
                let ids = 'cartActive' + cartProduct.product_id;
                console.log($('#' + ids));
                $('#' + ids).removeClass('selected_cart');
                let counterCartNumber = $('#counterCartItems').val();
                if (counterCartNumber > 0){
                    counterCartNumber = counterCartNumber - 1;
                    containerCounter.text(counterCartNumber);
                    $('#counterCartItems').val(counterCartNumber);
                    if(counterCartNumber === 0){
                        $('.cartHeaderGoToCart').hide();
                        $('#cart_none').show();
                        $('#card_body').hide();
                        $('.mbcart span').removeClass('counter')
                    }else{
                        return true;
                    }
                }else{
                    $('.cartHeaderGoToCart').hide();
                    $('#cart_none').show();
                    $('#card_body').hide();
                    $('.mbcart span').removeClass('counter')
                }
            } else {
                console.log('loging')
                let product_id_local = localStorage.getItem('product_id');
                product_id_local = JSON.parse(product_id_local);
                console.log(cartProduct.product_id);
                let ids = 'cartActive' + cartProduct.product_id;
                console.log($('#' + ids));
                $('#' + ids).removeClass('selected_cart');
                product_id_local = product_id_local.filter(item => item.product_id !== cartProduct.product_id);
                console.log(product_id_local);
                localStorage.removeItem('product_id');
                localStorage.setItem('product_id', JSON.stringify(product_id_local));
                let productID_carts = '';

                for (let i = 0; i < product_id_local.length; i++) {
                    productID_carts += product_id_local[i].product_id;
                }

                if (window.location.href.includes('/cart-list')) {
                    window.location.href = window.location.origin + '/cart-list?product_id=' + product_id_local;
                    $('#' + cartProduct.product_id).hide();
                }
            }

        }, error: function (data) {
            console.log(data);
        }
    })
}
