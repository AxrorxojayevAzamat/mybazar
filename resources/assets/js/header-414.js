$('.header').on('click', '.search-toggle', function(e) {
    var selector = $(this).data('selector');

    $(selector).toggleClass('show').find('.search-input').focus();
    $(this).toggleClass('active');

    e.preventDefault();
});

$(document).ready(function () {

    let droping = $('#droping');
    droping.hide();
    let searchInput = $('#search-input');

    searchInput.keyup(function(e){
        e.preventDefault();

        let inputValue = searchInput.val();

        let data = {};
        data.search = inputValue;

        $.ajax({
            url: 'api/search',
            method: 'GET',
            data: data,
            dataType: 'json',
            success:function (data){
                droping.show();
                let dropData = '';
                for (let i = 0; i < data.brands.data.length; i++){
                    if(data.brands.data[i].name !== undefined){
                        dropData += `<div>${ data.brands.data[i].name }</div>`;
                    }
                    console.log(dropData);
                }
                for (let i = 0; i < data.products.data.length; i++){
                    dropData += `<div>${ data.products.data[i].name }</div>`;
                }
                for (let i = 0; i < data.stores.data.length; i++){
                    dropData += `<div>${ data.stores.data[i].name }</div>`;
                }
                $('#droping').html(dropData);


                console.log(data);
            },
            error:function (data){
                console.log(data);
            }
        })
        console.log(inputValue);
    })
})
