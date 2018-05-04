<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$SKILL = new Skill($id);
?> 
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>create sub skill || Admin || Support Lanka</title>

        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>

        <section class="content">
            <?php
            $vali = new Validator();

            $vali->show_message();
            ?>
            <div class="container-fluid"> 
                <!-- Body Copy -->

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Create sub skill
                                </h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal"  method="post" action="post-and-get/sub-skill.php" enctype="multipart/form-data"> 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Skill</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group"> 
                                                <input type="text" value="<?php echo $SKILL->name; ?>" disabled="TRUE" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Sub Skill name" autocomplete="off" name="name" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5"> 
                                            <input type="hidden" id="skill" value="<?php echo $SKILL->id; ?>" name="skill"/>
                                            <input type="submit" name="add-sub-skill" class="btn btn-primary m-t-15 waves-effect" value="Add sub Skill"/>
                                        </div>
                                    </div>
                                    <hr/>
                                </form>
                            </div>

                            <div class="body">
                                <div class="header">
                                    <h2 class="text-center">
                                        Sub Skills
                                    </h2> 
                                </div> 
                                <div class="row clearfix">
                                    <?php
                                    foreach (SubSkill::getSkillDetails($id) as $key => $sub_skill) {
                                        ?>
                                        <div class="col-md-4" id="div_<?php echo $sub_skill['id']; ?>">

                                            <div><?php echo $sub_skill['name']; ?></div> 

                                            <div class="top-10"> 
                                                <a href="edit-sub-skill.php?id=<?php echo $sub_skill['id']; ?>" class="op-link btn btn-sm btn-info">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                </a> 

                                                |  
                                                <a href="#" class="delete-sub-skill btn btn-sm btn-danger" data-id="<?php echo $sub_skill['id']; ?>">
                                                    <i class="glyphicon glyphicon-trash" data-type="cancel"></i>
                                                </a>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?> 

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script> 
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>
        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="js/pages/ui/dialogs.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/demo.js"></script>
        <script src="delete/js/sub-skill.js" type="text/javascript"></script>
    </body>

</html>