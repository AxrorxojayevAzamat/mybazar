
 $(document).ready(function() {
    $('div.cart').each(function(){
        var name = $(this).attr("data-name");
        var cartArray = shoppingCart.listCart();
        for( var i in cartArray){
            if(cartArray[i].name === name){
                $(this).addClass('selected_cart');
            }
        }
    });
});

 $("div.cart").click(function(event) {

     $(this).addClass('selected_cart');
     event.preventDefault();
     
     var name = $(this).attr('data-name');
     var price = Number($(this).attr('data-price'));
     var url = $(this).attr('data-url');

     shoppingCart.addItemToCart(name, price, 1,url);
     displayCart();
 });
 
$('.clear-cart').click(function(event){
    shoppingCart.clearCart();
    displayCart();
});

function displayCart(){
    var cartArray = shoppingCart.listCart();
    var output = "";
    var dropdown_output ="";
    for (var i in cartArray){
        // my cart page display 
        output += `
        <div class='selected-items'>
            <div class='product-img'>
                <img src="${cartArray[i].url}">
            </div>
            <div class='description'>
                <h6 class='title'> ${cartArray[i].name}</h6>
                <div class='count'> ${cartArray[i].count}</div>
                <button class="btn subtract-product" data-name='${cartArray[i].name}'>-</button>
                <h5 class='price'>${cartArray[i].price} </h5>
                <button class='btn add-product' data-name='${cartArray[i].name}'>+</button>
                <button class="btn delete-product" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
            </div>
        </div>`;
        
        // dropdown cart display
        dropdown_output += `
        <a class='dropdown-item animated fadeInDown' href="#">
            <div class='product-img'>
                <img src="${cartArray[i].url}">
            </div>
            <div class='description'>
                <h5 class='title'> ${cartArray[i].name}</h5>
                <p class='price'>${cartArray[i].price} </p>
            </div>
            <button class="btn delete-btn" data-name='${cartArray[i].name}'><i class="mbexit_mobile"></i></button>
        </a>`
    }
    $('.cart-dropdown .dropdown-menu .selected-items').html(dropdown_output);
    $('#show-cart .list-items ').html(output);
    $('#show-cart span').html(shoppingCart.totalCart());
}

 //  Prevents menu from closing when clicked inside 
 $(".from-statistics-to-account .dropdown-menu .selected-items").click( function (event) { 
    event.stopPropagation(); 
}); 

// cart dropdown delete button
$('.cart-dropdown .dropdown-menu .selected-items').on("click", ".delete-btn", function(event){
    event.preventDefault();
    var name = $(this).attr("data-name");
    shoppingCart.removeItemFromCartAll(name);
    displayCart();

    $('div.cart').each(function(){
        if(name === $(this).attr("data-name")  ){
            $(this).removeClass('selected_cart');
        }
    });
    $("a.cart > i > span.counter").text(shoppingCart.countCart());
});

// my cart page delete buttton
$("#show-cart").on("click", ".delete-product", function(event){
    var name = $(this).attr("data-name");
    shoppingCart.removeItemFromCartAll(name);
    displayCart();

    $('div.cart').each(function(){
        if(name === $(this).attr("data-name")  ){
            $(this).removeClass('selected_cart');
        }
    });

    $("a.cart > i > span.counter").text(shoppingCart.countCart());
});

$("#show-cart").on("click", ".subtract-product", function(event){
    var name = $(this).attr("data-name");
    shoppingCart.removeItemFromCart(name);
    displayCart();
    $("a.cart > i > span.counter").text(shoppingCart.countCart());
});

$("#show-cart").on("click", ".add-product", function(event){
    var name = $(this).attr("data-name");
    shoppingCart.addItemToCart(name, 0 , 1);
    displayCart();
});


// ---------------- SHOPPING CART SCRIPT ------------------
var shoppingCart = {};
shoppingCart = [];

//create new item object function
shoppingCart.Item = function(name, price, count, url){
    this.name = name
    this.price = price
    this.count = count
    this.url = url
};

// addToCart(name, price, count)
shoppingCart.addItemToCart = function(name, price, count,url){
    for(var i in cart){
        if (cart[i].name === name){
            cart[i].count += count;
            this.saveCart();
            return;
        }
    }
    var item = new this.Item (name, price, count, url);
    cart.push(item);
    this.saveCart();
}

// removeItemFromCart(name)   --- removes one item
shoppingCart.removeItemFromCart = function (name){
    for(var i in cart){
        if (cart[i].name ===  name){
            cart[i].count--;
            if(cart[i].count === 0){
                cart.splice(i, 1);

                $('div.cart').each(function(){
                    if(name === $(this).attr("data-name")  ){
                        $(this).removeClass('selected_cart');
                    }
                });
            }
            break;
        }
    }
    this.saveCart();

}

// removeItemFromCartAll(name)  ---- removes all item name
shoppingCart.removeItemFromCartAll = function(name){
    for(var i in cart){
        if(cart[i].name === name){
            cart.splice(i, 1);
            break;
        }
    }
    this.saveCart();
}

// clearCart()
shoppingCart.clearCart = function(){
    cart = [];
    this.saveCart();
    $('div.cart').removeClass('selected_cart');
    $("a.cart > i > span.counter").text(this.countCart());

}

// countCart() -> return total count
shoppingCart.countCart = function(){
    var totalCount = 0;
    for ( var i in cart){
        totalCount +=cart[i].count;
    }
    return totalCount;
}

// totalCart() -> return total cost
shoppingCart.totalCart = function(){
    var totalCost = 0;
    for (var i in cart){
        totalCost += cart[i].price* cart[i].count;
    }
    return totalCost;
}

// listCart() -> array of Item
shoppingCart.listCart = function(){
     var cartCopy = [];
     for(var i in cart){
         var item = cart [i];
         var itemCopy = {};
         for( var p in item){
            itemCopy[p] = item[p];
         }
        cartCopy.push(itemCopy);
        $("a.cart > i > span").addClass("counter");
        $("a.cart > i > span.counter").text(this.countCart());
     }
     return cartCopy;
}
 
// saveCart()
shoppingCart.saveCart= function(){
    localStorage.setItem("shoppingCart", JSON.stringify(cart));  
}

// loadCart()
shoppingCart.loadCart = function(){
    cart = JSON.parse( localStorage.getItem("shoppingCart"));

}
shoppingCart.loadCart();
displayCart();
