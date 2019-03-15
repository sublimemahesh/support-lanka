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
                    html += '<option value="' + data.id + '">';
                    html += data.name;
                    html += '</option>';
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
