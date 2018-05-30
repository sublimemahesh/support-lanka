
jQuery(document).ready(function () {

    $("#btnSubmit").click(function (e) {
        var datastring = $("#register").serialize();
    
        
        $.ajax({
            url: "post-and-get/ajax/register.php",
            cache: false,
            dataType: "json",
            type: "POST",
            data: datastring,
            success: function (result) {
                if (result.status === 'error') {
                    $('#message1').text(result.message);
                    return false;
                } else if (result.status === 'success') {
                    window.location.replace("index.php");
                }
            }
        });
    });
});






