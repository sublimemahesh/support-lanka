<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');

$id = '';
if ($id = isset($_GET['id'])) {
    $id = $_GET['id'];
}
$MEMBER = new Member($id);
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Add New Member || Admin || Support Lanka</title>
        <!-- Favicon-->
         <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?> 
        <section class="content">
            <div class="container-fluid"> 
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>Add New Member Skill</h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-member.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal" id="member-data" method="post"  enctype="multipart/form-data"action="post-and-get/add-skill.php" > 
                                    <!--name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Member Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text"  class="form-control" value="<?php echo $MEMBER->name; ?>" disabled="TRUE" />
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <!-- city-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="Industry">Industry</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group place-select">
                                                <div class="form-line">
                                                    <select class="form-control" autocomplete="off" type="text" id="industry" autocomplete="off" name="industry" required="TRUE">
                                                        <option value=""> -- Please Select -- </option>
                                                        <?php foreach (Industry::all() as $key => $skil) {
                                                            ?>
                                                            <option ind_id="<?php echo $skil['id']; ?>" value="<?php echo $skil['id']; ?>"><?php echo $skil['name']; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Skill">Skill</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group place-select">
                                                    <div class="form-line">
                                                        <select class="form-control" autocomplete="off" type="text" id="skill-bar" autocomplete="off" name="skill" required="TRUE">
                                                            <option value=""> -- Please Select a Industry First -- </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="percentage">Percentage</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text"  class="form-control" name="percentage" placeholder="Enter Precentage"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Description ">Description </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea id="about_me" name="description" class="form-control" rows="5" placeholder="Enter Your Description"></textarea> 
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 text-center" style="margin-top: 19px;">
                                                <input type="hidden" value="<?php echo $MEMBER->id ?>" name="member" id="member">
                                                <input type="submit" class="btn btn-info" id="btn-submit" value="ADD" name="add-skill-details">
                                            </div>
                                        </div>
                                    </div>

                                </form> 
                            </div>
                            <div class="body">
                                <div class="header">
                                    <h2 class="text-center">
                                        Skills
                                    </h2> 
                                </div> 
                                <div class="row clearfix">
                                    <?php
                                    foreach (SkillDetail::GetSkillByMember($MEMBER->id) as $key => $skill_details) {
                                        foreach (Skill::GetSkillById($skill_details["skill"]) as $skill) {
                                            ?>
                                            <div class="col-md-4" id="row_<?php echo $skill_details['id']; ?>">

                                                <div><?php echo $skill['name']; ?></div> 

                                                <div class="top-10"> 
                                                    <a href="edit-skill.php?id=<?php echo $skill['id']; ?>" class="op-link btn btn-sm btn-info">
                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                    </a> 

                                                    |  
                                                    <a href="#" class="delete-member-skill btn btn-sm btn-danger" member-id="<?php echo $MEMBER->id?>"skill-id="<?php echo $skill['id']; ?>">
                                                        <i class="glyphicon glyphicon-trash" data-type="cancel"></i>
                                                    </a>

                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?> 

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script> 
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>
         <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/demo.js"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="delete/js/member-skill.js" type="text/javascript"></script>
        <script src="js/skill.js" type="text/javascript"></script>
        <script>
            tinymce.init({
                selector: "#about_me",
                // ===========================================
                // INCLUDE THE PLUGIN
                // ===========================================

                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                // ===========================================
                // PUT PLUGIN'S BUTTON on the toolbar
                // ===========================================

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                // ===========================================
                // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
                // ===========================================

                relative_urls: false

            });
        </script>
    </body>

</html>