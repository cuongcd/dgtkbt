$(document).ready(function () {

    Dropzone.autoDiscover = false;
    $("#load").dropzone({
        url: "images/upload",
        addRemoveLinks: true,
        removedfile: function (file) {
            var name = file.name;
            var size = file.size;
            $.ajax({
                type: 'POST',
                url: 'images/remove',
                data: 'name=' + name + '&size=' + size,
                dataType: 'html'
            });
            var _ref; // Remove file on clicking the 'Remove file' button
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        maxFiles: 10,
        uploadMultiple: true,
        maxfilesexceeded: function (file) {
            this.removeAllFiles();
            this.addFile(file);
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,audio/*,image/*,",
        createImageThumbnails: true,
        thumbnailWidth: 250,
        thumbnailHeight: 250,
        dictDefaultMessage: "Drop file here or Click to upload your images",
        success: function (file, response) {
            var imgName = response;
            var rowCount = $('#images_preview tr').length - 1;
            file.previewElement.classList.add("dz-success");
            $('#images_preview tr:last').after("<tr>" +
                "<td>" +
                "<img width ='150' src=/" + response + ">" +
                "</td>" +
                "<td>" +
                "<input type='text' class='form-control' disabled value=" + response + ">" +
                "</td>" +
                "<td>" +
                "<input type='text' size = '7' name ='" + response + "|order'  class='form-control' value=" + rowCount + ">" +
                "</td>" +
                "<td>" +
                "<textarea  type='text' name =" + response + "|description  class='form-control' value='0'" + "></textarea>" +
                "</td>" +
                "<td>" +
                "<span id='image_delete' class='btn btn-white'><i class='fa fa-trash'></i></span>" +
                "</td>" +
                " </tr>"
            );
            console.log("Successfully uploaded :" + imgName);
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        }
    });


    // delete images
    $('#images_preview').on('click', '#image_delete', function () {
        var ok = confirm('are you sure ?');
        var ojb = $(this);
        if (ok) {
            var id = $(this).attr('name');
            if (id != null) {
                $.ajax({
                    type: 'POST',
                    url: 'images/remove',
                    data: 'name=' + id,
                    dataType: 'html',
                    success: function (response) {
                        if (response == 'success') {
                            var tr = ojb.closest('tr');
                            tr.css("background-color", "#FF3700");
                            tr.fadeOut(400, function () {
                                tr.remove();
                            });
                            return false;
                        } else {
                            alert('Some Thing Error, Please try again!')
                        }
                    }
                });
            } else {
                var tr = ojb.closest('tr');
                tr.css("background-color", "#FF3700");
                tr.fadeOut(400, function () {
                    tr.remove();
                });
                return false;
            }
        }
    });

});

