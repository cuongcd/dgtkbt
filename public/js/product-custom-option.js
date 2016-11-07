$(document).ready(function(){
    function replaceAt(s, n, t) {
        return s.substring(0, n) + t + s.substring(n + 1);
    }
    $('#add_new_option').on('click', function(e){
        e.preventDefault();
        var clonedHtml = $('#hide_product-custom-option').clone(true, true).get(0);
        $(clonedHtml).find('.hideCount').val(0);
        $(clonedHtml).find('.titleCustomOption').each(function(){
            $(this).attr('required','');
            $(this).attr('title','This field is required');
        });
        $(clonedHtml).find('.type').each(function(){
            $(this).attr('required','');
            $(this).attr('title','This field is required');
        });
        $(clonedHtml).find('.hidden-required').val(0);
        var customKey = $('.product-custom-option').length;
        $(clonedHtml).find(".form-control").each(function(index, element) {
            if (element.id || element.name) {
                element.name = replaceAt(element.name,8,customKey);
            }
        });
        $(clonedHtml).insertAfter('.product-custom-option:last');
        $('.product-custom-option:last').css('display','block');
        $('.product-custom-option:last').children().find('.option_two').css('display','none');
    });


    $('.addNew').on('click', function(e){
        var table = $(this).parents(".table");
        var clonedHtml = table.find('.option_two_body_tr:first').clone(true, true).get(0);
        var lengthMulti = table.find('.option_two_body_tr').length;
        var time = new Date().getTime();
        $(clonedHtml).find(".values").each(function(index, element) {
            console.log(index);
            console.log(element);
            element.name = replaceAt(element.name,element.name.lastIndexOf("|")-1,time);
            if(!$(this).is('#customs-values-price_type'))
                $(this).val("");
        });
        if(lengthMulti){
            var insertNew = table.find('.option_two_body_tr:last');
            e.preventDefault();
            $(clonedHtml).insertAfter(insertNew);
        }else{
            var insertNew = $(this).closest('.option_three').prev();
            e.preventDefault();
            $(clonedHtml).appendTo(insertNew);
        }
    });
    $(".deleteRow").click(function(e) {
        var len = $(this).closest('.option_two_body').find('.option_two_body_tr').length;
            if(len>0){
                $(this).closest(".option_two_body_tr").remove();
                e.preventDefault();
            }
    });

    $(".delete-option").click(function(e) {
        if (confirm('Are you sure ?')) {
            var nesta_id = $(this).closest('.ibox-title').next('.ibox-content').children('.option_one').find('.idCustoms').val();
            var url = window.location.pathname.split( '/' );
            var id = url[3];
            if(nesta_id){
                $.ajax({
                    url:  "/products/customs/"+id+"/delete/"+nesta_id,
                    //                    alert(url); die;
                    beforeSend: function () {
                        $('#ajax-loading-mask').show();
                        $('#ajax-loading').show();
                    },
                    success: function (response) {
                        $('#ajax-loading-mask').hide();
                        $('#ajax-loading').hide();
                    }
                });
            }
            $(this).closest(".product-custom-option").remove();
            e.preventDefault();
        }
    });
//        uncheck checkbox
    $('input.is-required').click(function(){
        if($(this).prop('checked')==false){
            $(this).prev().val('0');
        }
        else{
            $(this).prev().val('1');
        }
    });
//        type change - add new select option
    $(document).on('change', '.type', function(e) {
        var val = $(this).val();
    //            set value for countValues
        $(this).closest('.option_one').next('.option_two').find('.table').find('.hideCount').val(1);
        var el = $(this).closest('.option_one').next('.option_two');
        var chid = el.find('.option_two_body_tr').length;
        var elAdd = $(this).closest('.option_one').next('.option_two').find('.option_three');
        if (val == 'field' || val == 'area' || val == 'date' || val == 'date_time' || val == 'time') {
            if(chid){
                el.find('.option_two_body_tr').not(':first').hide();
                el.attr('disabled', false);
                el.find('.deleteRow').hide();
                el.show();
                el.children().find('.title-option-two').hide();
                elAdd.hide();
            }else{
                var clonedHtml = $('.option_two_body_tr:first').clone(true, true).get(0);
                insertNew = el.find('.option_two_body');
                e.preventDefault();
                $(clonedHtml).appendTo(insertNew);
                el.attr('disabled', false);
                el.find('.deleteRow').hide();
                el.children().find('.title-option-two').hide();
                elAdd.hide();
            }

        } else if(val == 'drop_down' || val == 'radio' || val == 'checkbox' || val == 'multiple'){
            el.attr('disabled', false);
            el.show();
            el.find('.deleteRow').show();
            el.children().find('.title-option-two').show();
            elAdd.show();
        }else{
            el.attr('disabled', true);
            el.hide();
            elAdd.hide();
        }
    });
    $(document).on('change', '.titleCustomOption', function() {
        var variant = $(this).val();
        $(this).closest('.ibox-content').prev('.ibox-title').find('.newOptions').text(variant);
        })
});