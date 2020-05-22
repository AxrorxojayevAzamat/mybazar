$(document).ready(function(){
    
    $(".toggle-view a").on('click', function(event){
        event.preventDefault();
        if (!$(this).hasClass('view-blue-bg')) {
            if($('.toggle-view a').hasClass('view-blue-bg')){
                $('.toggle-view a').removeClass('view-blue-bg');
            } 
            $(this).addClass('view-blue-bg');
            $('.all-filtered-items').toggleClass('column');
            $('.item-action-icons').toggleClass('list');
            $('.all-filted-items').toggleClass('list-styles');
        }
    });
    $('.wrapper-filtered-items nav .sort-by-btn').on('click', function(event){
        event.preventDefault();
        if($('.wrapper-filtered-items nav .sort-by-btn').hasClass('active')){
            $('.wrapper-filtered-items nav .sort-by-btn').removeClass('active');
            $('.wrapper-filtered-items nav .sort-by-btn i').removeClass('mbshow');
        }
        $(this).addClass('active');
        $(this).children('i').addClass('mbshow');
    })
});

jQuery(function($) {
    var frominput= $('.js-input-from').autoNumeric("init");
    var toinput= $('.js-input-to').autoNumeric("init");
    // $('input:text').trigger
    var rangeslider=document.getElementsByClassName('js-range-slider');
    rangeslider.onchange = function(){
        frominput.autoNumeric('update');
        toinput.autoNumeric('update');
    }
});