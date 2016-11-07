$(document).ready(function () {
    $('#magento_synchronization_btn').click(function () {
        $("#ajax-loading-mask").show();
        $("#ajax-loading").show();
        $.ajax({
            type: "GET",
            url: "/months/setcurrent",
            success: function (response) {
                $("#ajax-loading-mask").hide();
                $("#ajax-loading").hide();
            }, error: function (response) {
                $("#ajax-loading-mask").hide();
                $("#ajax-loading").hide();
            }
        });

    });
});
