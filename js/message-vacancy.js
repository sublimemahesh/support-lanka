$(document).ready(function () {

    $('#form-message').submit(function (e) {
        e.preventDefault();
       
        var formData = new FormData($('#form-message')[0]);
        $.ajax({
            url: "ajax/message-vacancy.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (mess) {
                if (mess.status === 'save') {
                    swal("Successfully!", "Your message successfully sent!", "success");
                    $("#form-message")[0].reset();
                } else if (mess.status === 'error') {
                    swal({
                        title: "Error!",
                        text: "Your message could not be sent!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        closeOnConfirm: false
                    }, );
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});
