<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');

$id = '';
if ($id = isset($_GET['id'])) {
    $id = $_GET['id'];
}
$MEMBER = new Member($id);
$SKILL_BY_MEMBER = SkillDetail::GetSkillByMember($id);
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Add New Member || Admin || Support Lanka</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
        <!-- Bootstrap Spinner Css -->
        <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">
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
                                <h2>Add New Member Portfolio</h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-member.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal" id="member-data" method="post"  enctype="multipart/form-data"action="post-and-get/add-portfolio.php" > 
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




                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="title">Skill</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">

                                                        <select class="form-control" autocomplete="off" type="text" id="industry" autocomplete="off" name="skill-detail" required="TRUE">
                                                            <?php
                                                            foreach ($SKILL_BY_MEMBER as $skill_by_member) {
                                                                $SKILL = new Skill($skill_by_member['skill']);
                                                                ?>
                                                                <option value="<?php echo $SKILL->id; ?>"><?php echo $SKILL->name; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>                                                               

                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="title">Title</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text"  class="form-control" name="title" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="date">Date</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="date"  class="form-control" name="date" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 



                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Description">Description </label>
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
                                                <input type="hidden" value="<?php echo $SKILL_BY_MEMBER ?>" name="member" id="member">
                                                <input type="submit" class="btn btn-info" id="btn-submit" value="ADD" name="add-portfolio">
                                            </div>
                                        </div>
                                    </div>

                                </form> 
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
        <script src="js/admin.js"></script>
        <script src="js/demo.js"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
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