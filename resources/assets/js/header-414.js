$('.header').on('click', '.search-toggle', function(e) {
    var selector = $(this).data('selector');

    $(selector).toggleClass('show').find('.search-input').focus();
    $(this).toggleClass('active');

    e.preventDefault();
});

$(document).ready(function () {
    let searchInput = $('#search-input');

    searchInput.keyup(function(e){
        e.preventDefault();

        let inputValue = searchInput.val();

        let data = {};
        data.search = inputValue;
        // $.ajaxSetup({
        //     headers:{
        //
        //     }
        // })

        $.ajax({
            url: 'api/search',
            method: 'GET',
            data: data,
            dataType: 'json',
            success:function (data){
                console.log(data);
            },
            error:function (data){
                console.log(data);
            }
        })
        console.log(inputValue);
    })
})
