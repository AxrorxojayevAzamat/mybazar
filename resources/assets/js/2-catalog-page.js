$(document).ready(function () {
    $(".toggle-view a").on('click', function (event) {
        event.preventDefault();
        if (!$(this).hasClass('view-blue-bg')) {
            if ($('.toggle-view a').hasClass('view-blue-bg')) {
                $('.toggle-view a').removeClass('view-blue-bg');
            }
            $(this).addClass('view-blue-bg');
            $('.all-filtered-items').toggleClass('column');
            if (!$('.all-filtered-items').hasClass('column')) {
                localStorage.setItem('col-row-view', 'list');
            } else {
                localStorage.setItem('col-row-view', 'column');
            }
            console.log();
            $('.item-action-icons').toggleClass('list');
            $('.all-filted-items').toggleClass('list-styles');
        }
    });
    $('.wrapper-filtered-items nav .sort-by-btn label').on('click', function (event) {
        event.preventDefault();
        if ($('.wrapper-filtered-items nav .sort-by-btn label').hasClass('active')) {
            $('.wrapper-filtered-items nav .sort-by-btn label').removeClass('active');
            $('.wrapper-filtered-items nav .sort-by-btn label i').removeClass('mbshow');
        }
        $(this).addClass('active');
        $(this).children('i').addClass('mbshow');
    });
    $('.outter-full-comments .comments .sort-by-btn').on('click', function (event) {
        event.preventDefault();
        if ($('.outter-full-comments .comments .sort-by-btn').hasClass('active')) {
            $('.outter-full-comments .comments .sort-by-btn').removeClass('active');
            $('.outter-full-comments .comments .sort-by-btn i').removeClass('mbshow');
        }
        $(this).addClass('active');
        $(this).children('i').addClass('mbshow');
    });

    $('.pr-des-radio-buttons div').click(function () {
        $('.pr-des-radio-buttons div').removeClass('active');
        $(this).addClass('active');
    });
    $('.pr-des-radio-buttons2 div').click(function () {
        $('.pr-des-radio-buttons2 div').removeClass('active');
        $(this).addClass('active');
    });

    $('.pr-des-radio-buttons3  .color div').click(function () {
        $('.pr-des-radio-buttons3 .color').removeClass('active');
        $(this).parent().addClass('active');
    });



});



// jQuery(function ($) {
//     var frominput = $('.js-input-from').autoNumeric("init");
//     var toinput = $('.js-input-to').autoNumeric("init");
//     // $('input:text').trigger
//     var rangeslider = document.getElementsByClassName('js-range-slider');
//     rangeslider.onchange = function () {
//         frominput.autoNumeric('update');
//         toinput.autoNumeric('update');
//     }
// });
