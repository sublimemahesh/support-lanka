$(document).ready(function () {

    $("#suggesstion-box-bar").hide();
    $("#search-box").keyup(function () {

        var keyword = $(this).val()

        $.ajax({
            type: "POST",
            url: "ajax/search.php",
            data: {
                keyword: keyword,
                action: 'SEARCH'
            },
            dataType: "JSON",
            success: function (jsonStr) {
                var html = '';
                $.each(jsonStr.data, function (i, data) {
                     
                    html += '<li value="' + data.id + '" style="padding: 5px;"> ';
                    html += data.name;
                    html += '</li>';
                    
                });
                $("#suggesstion-box-bar").show();
                $("#suggesstion-box").append(html);
            }
        });
    });
//gate name by search
    $("#suggesstion-box").click(function () {
        var id = $(this).val();

        $.ajax({
            type: "POST",
            url: "ajax/search.php",
            data: {
                id: id,
                action: 'GETNAME'
            },
            dataType: "JSON",
            success: function (jsonStr) {
                $("#search-box").val(jsonStr.data);
            }
        });
    });
});
