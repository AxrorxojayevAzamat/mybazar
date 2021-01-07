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
        let inputValue = $('#search-input').val();
        console.log(inputValue);
        let categoeyId = $('#categoryIdInSearch').val();
        if(inputValue === '' && e.which === 13){
            console.log(inputValue);
            location.reload();
        }
        let data = {};
        data.search = inputValue;
        data.category_id = categoeyId;

        $.ajax({
            url: '/api/search',
            method: 'GET',
            data: data,
            dataType: 'json',
            success: function (data) {
                // console.log(data)
                droping.show();
                let dropData = '';
                dropData += `
                        <a href="/search?search=${inputValue}">
                            <div class="item with-icon">
                                <i class="mbsearch_resulticon"></i>
                                <h6 class="title">${inputValue}</h6>
                                <i class="mbgotoresults_searchresulticon"></i>
                            </div>
                        </a>
                `;
                for (let i = 0; i < data.brands.data.length; i++) {
                    console.log(data.brands.data[i].name);
                    if (data.brands.data[i].name !== undefined) {
                        dropData += `
                        <a href="/brands/${data.brands.data[i].id}">
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
                console.log(data.products);
                for (let i = 0; i < data.products.length; i++) {
                    dropData += `<a href="/products/show/${data.products[i].id}">
                                    <div class="item product">
                                        <div class="image">
                                            <img src="${data.products[i].main_photo}" alt="">
                                        </div>
                                        <div class="description">
                                            <h6 class="title">${data.products[i].name_uz}</h6>
                                            <p class="sub-title price">${data.products[i].price_uzs} <span>сум</span></p>
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

    function removing(id){

    }

    function colmRow(){
        if (localStorage.getItem('col-row-view') === 'column') {
            $('.all-filtered-items').addClass('column');
            $('.item-action-icons').addClass('list');
            $('.column-view').addClass('view-blue-bg');
            $('.list-view').removeClass('view-blue-bg');
        }else{
            return  0;
        }
    }
    colmRow();




    // $('#goToCart').submit(function (){
    //     console.log('submit');
    // })


});
