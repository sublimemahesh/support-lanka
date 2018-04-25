
jQuery(document).ready(function () {

    $("#btnSubmit").click(function (e) {
        tinymce.triggerSave();
        var datastring = $("#email-validation").serialize();
     
        $.ajax({
            url: "post-and-get/ajax/create-member.php",
            cache: false,
            dataType: "json",
            type: "POST",
            data: datastring,
            success: function (result) {
                if (result.status === 'error') {
                    $('#message').text(result.message);
                    return false;
                } else if (result.status === 'success') {
                    window.location.replace("create-member.php");
                }
            }
        });


    });
});






