$(document).ready(function () {

    $("#create").click(function (event) {
        event.preventDefault();

        if (!$('#name').val() || $('#name').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your name..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });

        } else if (!$('#email').val() || $('#email').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your email..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#mobile').val() || $('#mobile').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your mobile number..!",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });

        } else if (!$('#comment').val() || $('#comment').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter your Comment",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        } else if (!$('#captchacode').val() || $('#captchacode').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the captcha code",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });

        } else {

            var formData = new FormData($("form#form-data")[0]);

            $.ajax({
                url: "comment/comment.php",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {

                    if (result.status === 'error') {
                        swal({
                            title: "Error!",
                            text: "Security code is invalid",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        swal({
                            title: "Success.!",
                            text: "Thank For You..! Your comment has been Active..",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }, function () {
                            setTimeout(function () {
                                window.location.replace("all_member.php");
                            }, 2000);
                        });
                    }
                }
            });
        }
        return false;
    });

});

