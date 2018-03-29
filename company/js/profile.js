$(document).ready(function () {

    $('#logo-image').change(function () {

        var formData = new FormData($('#upForm')[0]);

        $.ajax({
            url: "post-and-get/ajax/profile.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (mess) {

                $("#logo_image").attr("src", "../upload/company/" + mess.filename);
                $("#logo_image1").attr("src", "../upload/company/" + mess.filename);


            },
            cache: false,
            contentType: false,
            processData: false
        });

    });
});