
$(document).ready(function () {
    $('.view-portfolio').click(function () {

        var port_id = this.id;
        
        $('#modal-title').empty('data-title');
        $('#modal-description').empty('data-description');

        var title = $(this).attr('data-title');
        var description = $(this).attr('data-description');

        $('#slider-images').empty();
        $.ajax({
            url: "ajax/portfolio.php",
            type: "POST",
            data: {
                portfolio: port_id.replace("port_", ""),
                action: 'GETPORTFOLIOPHOTOSBYMEMBER'
            },
            dataType: "JSON",
            success: function (jsonStr) {
                var html = ''
                $.each(jsonStr, function (key, data) {
                    if (key == 0) {

                        html += '<div class="item active">';
                        html += '<img src="upload/portfolio/' + data.image_name + '" alt="Chania">';
                        html += '<div class="carousel-caption">';
                        html += '<p>' + data.caption + '</p>';
                        html += ' </div>';
                        html += ' </div>';
                    } else {

                        html += '<div class="item">';
                        html += '<img src="upload/portfolio/' + data.image_name + '" alt="Chania">';
                        html += '<div class="carousel-caption">';
                        html += '<p>' + data.caption + '</p>';
                        html += ' </div>';
                        html += ' </div>';
                    }
                });

                $('#slider-images').append(html);
                $('#modal-title').append(title);
                $('#modal-description').append(description);
                $("#myModal").modal('show');

            }
        });
    });

});
