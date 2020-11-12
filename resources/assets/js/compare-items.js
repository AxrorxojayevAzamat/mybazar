
 $(document).ready(function() {
    $('div.libra').each(function(){
        var name = $(this).attr("data-name");
        var cartArray = compareCart.listCart();
        for( var i in cartArray){
            if(cartArray[i].name === name){
                $(this).addClass('selected_libra');
            }
        }
    });
});

 $("div.libra").click(function(event) {

     $(this).addClass('selected_libra');
     event.preventDefault();
     
     var name = $(this).attr('data-name');
     var price = Number($(this).attr('data-price'));
     var url = $(this).attr('data-url');

     compareCart.addItemToCart(name, price, 1,url);
     displayCompareCart();
 });
 
// $('.clear-compare-cart').click(function(event){
//     compareCart.clearCart();
//     displayCompareCart();
// });

function displayCompareCart(){
    var cartArray = compareCart.listCart();
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
                <button class="subtract-product" data-name='${cartArray[i].name}'>-</button>
                <h5 class='price'>${cartArray[i].price} </h5>
                <button class='add-product' data-name='${cartArray[i].name}'>+</button>
                <button class="delete-product" data-name='${cartArray[i].name}'>x</button>
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
    $('.compare-dropdown .dropdown-menu .selected-items').html(dropdown_output);
    // $('#show-cart .list-items ').html(output);
    // $('#show-cart span').html(compareCart.totalCart());
}

 //  Prevents menu from closing when clicked inside 
 $(".from-statistics-to-account .dropdown-menu .selected-items").click( function (event) { 
    event.stopPropagation(); 
}); 

// cart dropdown delete button
$('.compare-dropdown .dropdown-menu .selected-items').on("click", ".delete-btn", function(event){
    event.preventDefault();
    var name = $(this).attr("data-name");
    compareCart.removeItemFromCartAll(name);
    displayCompareCart();

    $('div.libra').each(function(){
        if(name === $(this).attr("data-name")  ){
            $(this).removeClass('selected_libra');
        }
    });
    $("a.comparison > i > span.counter").text(compareCart.countCart());
});

// my cart page delete buttton
// $("#show-cart").on("click", ".delete-product", function(event){
//     var name = $(this).attr("data-name");
//     compareCart.removeItemFromCartAll(name);
//     displayCompareCart();

//     $('div.libra').each(function(){
//         if(name === $(this).attr("data-name")  ){
//             $(this).removeClass('selected_libra');
//         }
//     });

//     $("a.comparison > i > span.counter").text(compareCart.countCart());
// });

// $("#show-cart").on("click", ".subtract-product", function(event){
//     var name = $(this).attr("data-name");
//     compareCart.removeItemFromCart(name);
//     displayCompareCart();
//     $("a.comparison > i > span.counter").text(compareCart.countCart());
// });

// $("#show-cart").on("click", ".add-product", function(event){
//     var name = $(this).attr("data-name");
//     compareCart.addItemToCart(name, 0 , 1);
//     displayCompareCart();
// });


// ---------------- SHOPPING CART SCRIPT ------------------
var compareCart = {};
comparecart = [];

//create new item object function
compareCart.Item = function(name, price, count, url){
    this.name = name
    this.price = price
    this.count = count
    this.url = url
};

// addToCart(name, price, count)
compareCart.addItemToCart = function(name, price, count,url){
    for(var i in ccart){
        if (ccart[i].name === name){
            ccart[i].count += count;
            this.saveCart();
            return;
        }
    }
    var item = new this.Item (name, price, count, url);
    ccart.push(item);
    this.saveCart();
}

// removeItemFromCart(name)   --- removes one item
compareCart.removeItemFromCart = function (name){
    for(var i in ccart){
        if (ccart[i].name ===  name){
            ccart[i].count--;
            if(ccart[i].count === 0){
                ccart.splice(i, 1);

                $('div.libra').each(function(){
                    if(name === $(this).attr("data-name")  ){
                        $(this).removeClass('selected_libra');
                    }
                });
            }
            break;
        }
    }
    this.saveCart();
}

// removeItemFromCartAll(name)  ---- removes all item name
compareCart.removeItemFromCartAll = function(name){
    for(var i in ccart){
        if(ccart[i].name === name){
            ccart.splice(i, 1);
            break;
        }
    }
    this.saveCart();
}

// clearCart()
compareCart.clearCart = function(){
    ccart = [];
    this.saveCart();
    $('div.libra').removeClass('selected_libra');
    $("a.comparison > i > span.counter").text(this.countCart());

}

// countCart() -> return total count
compareCart.countCart = function(){
    var totalCount = 0;
    for ( var i in ccart){
        totalCount +=ccart[i].count;
    }
    return totalCount;
}

// totalCart() -> return total cost
compareCart.totalCart = function(){
    var totalCost = 0;
    for (var i in ccart){
        totalCost += ccart[i].price* ccart[i].count;
    }
    return totalCost;
}

// listCart() -> array of Item
compareCart.listCart = function(){
     var cartCopy = [];
     for(var i in ccart){
         var item = ccart [i];
         var itemCopy = {};
         for( var p in item){
            itemCopy[p] = item[p];
         }
        cartCopy.push(itemCopy);
        $("a.comparison > i > span").addClass("counter");
        $("a.comparison > i > span.counter").text(this.countCart());
     }
     return cartCopy;
}
 
// saveCart()
compareCart.saveCart= function(){
    localStorage.setItem("compareCart", JSON.stringify(ccart));  
}

// loadCart()
compareCart.loadCart = function(){
    ccart = JSON.parse( localStorage.getItem("compareCart"));

}
compareCart.loadCart();
displayCompareCart();
