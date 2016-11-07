$(document).ready(function () {
    $('body').append('<input type="file" id="product_file_upload" style="position: absolute;top:-100px;" accept=".csv,.xlsx">');
    $('button.import-button').click(function () {
        $('#product_file_upload').click();
    });
    $(document).on('change','#product_file_upload',function(){
        alert(import_exec);
        var file = this.files[0];
        var size = file.size;
        if(size > 3500000){
            alert('file size < 3.5mb');
            return false;
        }
        var form_data = new FormData();
        form_data.append('file', file);

        $.ajax({
            url: import_exec,
            type: 'POST',
            data: form_data,
            //Ajax events
            beforeSend: function (xhr) {
                $("#ajax-loading-mask").show();
                $("#ajax-loading").show();
            },
            success: function (response) {
                alert(response);
                $("#ajax-loading-mask").hide();
                $("#ajax-loading").hide();
                window.location.reload();
            },
            error: function (response) {
                alert(response);
                $("#ajax-loading-mask").hide();
                $("#ajax-loading").hide();
                window.location.reload();
            },
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'text'
        });
    });
});