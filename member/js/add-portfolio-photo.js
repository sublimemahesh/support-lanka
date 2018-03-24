$(document).ready(function () {

    $('#portfolio-picture').change(function () {

        $('#loading').show();
        var formData = new FormData($('#form-new-portfolio-photo')[0]);
        $.ajax({
            url: "post-and-get/ajax/add-portfolio-photo.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (mess) {

                var arr = mess.filename.split('.');
                var html = '';
                html += '<div class="col-md-3" style="padding-bottom: 15px" id="div_' + mess.id + '">';
                html += '<div class="number-class">';
                html += '(0)';
                html += '</div>';
                html += '<img src="../upload/portfolio/thumb/' + mess.filename + '" class="img-responsive "> ';
                html += '<a class="aa">';
                html += '<button class="delete-portfolio-photo delete-icon btn btn-danger btn-md fa fa-trash-o" data-id="' + mess.id + '"></button>';
                html += '</a>';
                html += '</div>';
                $('#image-list').prepend(html);
                $('#loading').hide();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

});
