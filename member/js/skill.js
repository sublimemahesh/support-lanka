$(document).ready(function () {
;
    $("#skill").show();


    $(".result").click(function () {

        $("#skill").show();

        var ind_id = $(this).attr('ind_id');

        $.ajax({
            url: "post-and-get/ajax/skill.php",
            type: "POST",
            data: {industry: ind_id,
                action: 'GETSKILLSBYINDUSTRY'
            },
            dataType: "JSON",
            success: function (jsonStr) {

                var html = "";

                html += "<ul class='list-group'>";

                $.each(jsonStr, function (index, element) {


                    html += "<li class='list-group-item'><a href='post-add_step3.php?category=" + cat_id + "&subCategory=" + subcat_id + "&district=" + dis_id + "&city=" + element.id + "'>" + element.name + "</a></li>";


                });

                html += "</ul>";


                $('#skill').empty();
                $('#skill').append(html);

                $('html, body').animate({
                    scrollTop: $("#skill-bar").offset().top
                }, 1000);
            }
        });
    });


});