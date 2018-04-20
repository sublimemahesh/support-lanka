$(document).ready(function () {

    $('.check-email').click(function () {

        var id = $(this).attr("data-id");

        
        }, function () {

            $.ajax({
                url: "member/Email-validation/alert.js",
                type: "POST",
                data: {email: email, option: 'email'},
                dataType: "JSON",
                success: function (jsonStr) {
                    if (jsonStr.status) {

                        swal({
                            title: "Your Email had Created..!",
                            text: "Your Email had Created..!",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#div_' + id).remove();
                    }
                }
            });
        });
    });
