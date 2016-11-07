$(document).ready(function () {
    $('.summernote').summernote({height: 250});

    Dropzone.autoDiscover = false;
    $(".dropzone").dropzone({
        url: "images/upload",
        maxFiles: 1,
        uploadMultiple: false,
        maxfilesexceeded: function (file) {
            this.removeAllFiles();
            this.addFile(file);
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF",
        thumbnailWidth: 250,
        thumbnailHeight: 250,
        success: function (file, response) {
            var imgName = response;
            file.previewElement.classList.add("dz-success");
            console.log("Successfully uploaded :" + imgName);
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        }
    });
});


