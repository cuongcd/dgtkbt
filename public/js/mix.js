function toggleLoading(){
    $('#ajax-loading-mask').toggle();
    $('#ajax-loading').toggle();
    $('#ajax-loading').css({'top': $(document).scrollTop()+200});
    
    //hide last alerts
    //if($('.alert-block').length > 0){
    //    var alertBlocks = $('.alert-block');
    //    for(var i=0; i< alertBlocks.length; i++){
    //        var alertBlock =  $(alertBlocks[i]);
    //        alertBlock.hide();
    //    }
    //}
}

function hideLoading(){
    $('#ajax-loading-mask').hide();
    $('#ajax-loading').hide();
}

$('.summernote').summernote({height: 250});

$(function() {
    //only firefox, ie
    if(navigator.userAgent.match(/msie|trident/i) || navigator.userAgent.match(/firefox/i))
        $(".datepicker").datepicker();
});