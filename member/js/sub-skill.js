$(document).ready(function () {


    $('#skill-bar').change(function () {
        var skillId = $(this).val();
        $.ajax({
            url: "post-and-get/ajax/sub-skill.php",
            type: "POST",
            data: {
                skill: skillId,
                action: 'GETSUBSKILLSBYSKILL'
            },
            dataType: "JSON",
            success: function (jsonStr) {

                var html = '<option> -- Please Select a sub-Skill -- </option>';
                $.each(jsonStr, function (i, data) {
                    html += '<option value="' + data.id + '">';
                    html += data.name;
                    html += '</option>';
                });
                $('#sub-skill-bar').empty();
                $('#sub-skill-bar').append(html);
            }
        });
    });
});

$(document).ajaxStart(function () {
    $('#loading').show();
});

$(document).ajaxComplete(function () {
    $('#loading').hide();
});
