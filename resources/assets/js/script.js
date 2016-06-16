/**
 * Created by aleksander on 22.04.16.
 */
$(document).ready(function () {

    $("#images").on('change', function() {
        uploadImage();
    });

    function uploadImage() {
        $.ajax({
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            type: 'POST',
            url: $("#productForm").attr('action'),
            data: {
                data: new FormData($("#productForm"))
            },
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
            }
        });
    }

    function previewImages () {

        //$("#image-preload")

    }
});