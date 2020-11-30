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
            url: '/api/search',
            method: 'GET',
            data: data,
            dataType: 'json',
            success: function (data) {
                droping.show();
                let dropData = '';
                dropData += `
                    <form action="/search?search=${inputValue}" method="GET">
                        <button href="#">
                            <div class="item with-icon">
                                <i class="mbsearch_resulticon"></i>
                                <h6 class="title">${inputValue}</h6>
                                <i class="mbgotoresults_searchresulticon"></i>
                            </div>
                        </button>
                    </form>
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




    // $('#goToCart').submit(function (){
    //     console.log('submit');
    // })


});
