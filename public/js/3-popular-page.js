
$('.custom-control .checkAll').on('click',function(){
    console.log($(this).parent());
    if($(this).is(':checked')){
       $(this).parent().parent().find('.custom-control input[type="checkbox"]').prop('checked','checked');
        }else{        
            $(this).parent().parent().find('.custom-control input[type="checkbox"]').prop('checked','');
    }
});