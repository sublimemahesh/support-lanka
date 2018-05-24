$(document).ready(function () {
 
    $('.delete-member-skill').click(function () {
        var skillid = $(this).attr("skill-id");
        var memberid = $(this).attr("member-id");
      
       

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {

            $.ajax({
                url: "delete/ajax/member-skill.php",
                type: "POST",
                data: {skillid: skillid,memberid:memberid, option: 'delete'},
                dataType: "JSON",
                success: function (jsonStr) {
                    if (jsonStr.status) {

                        swal({
                            title: "Deleted!",
                            text: "Skill has been deleted.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#div_' + skillid).remove();

                    }
                }
            });
        });
    });
});