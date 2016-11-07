$(document).ready(function () {
    $('#room_id').change(function () {
        $("#ajax-loading-mask").show();
        $("#ajax-loading").show();
        $.ajax({
            type: "GET",
            data: {'_id': $('#room_id').val()},
            url: url,
            success: function (response) {
               $('#chucdanh_id').html(response);
                $("#ajax-loading-mask").hide();
                $("#ajax-loading").hide();
            }, error: function (response) {
                $("#ajax-loading-mask").hide();
                $("#ajax-loading").hide();
            }
        });

    });
    $('#chuyen_bac').click(function(){
        var $old_level = $('#level_id').val();
        var $new_level = $('#new_level_id').val();

        $("#ajax-loading-mask").show();
        $("#ajax-loading").show();
        $.ajax({
            type: "GET",
            data: {
                'old_level': $old_level,
                'new_level' : $new_level
            },
            url: changeUrl,
            success: function (response) {

                $("#ajax-loading-mask").hide();
                $("#ajax-loading").hide();
            }, error: function (response) {
                $("#ajax-loading-mask").hide();
                $("#ajax-loading").hide();
            }
        });
        alert("Chuyển Thành Công");
        location.reload();

    })
});
