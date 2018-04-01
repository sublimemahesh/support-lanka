<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
?> 
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Experience || My Account || Support Lanka</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

        <style>
            .img-thumbnail {
                max-width: 50% !important;
            }
        </style>
    </head> 
    <body> 
        <section id="container" > 
            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row  top-bott20"> 
                            <?php
                            $vali = new Validator();
                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-save"></i> Manage Experience</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="body">
                                            <div class="table-responsive">
                                                <div>

                                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Skill</th>
                                                                <th>Working Place</th>
                                                                <th>Duration</th>
                                                                <th>Description</th>
                                                                <th>Option</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Skill</th>
                                                                <th>Working Place</th>
                                                                <th>Duration</th> 
                                                                <th>Description</th>
                                                                <th>Option</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            <?php
                                                            $EXPERIENCE = new Experience(NULL);

                                                            foreach ($EXPERIENCE->GetExperienceByMember($_SESSION['id']) as $key => $exp) {
                                                                ?>

                                                                <tr id="row_<?php echo $exp['id']; ?>">
                                                                    <td><?php echo $exp['sort']; ?></td> 
                                                                    <td>
                                                                        <?php
                                                                        $SKILL_D = new SkillDetail($exp['skill_detail']);
                                                                        $SKILL = new Skill($SKILL_D->skill);
                                                                        echo $SKILL->name;
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo $exp['working_place']; ?></td>
                                                                    <td><?php echo $exp['duration']; ?></td>
                                                                    <td><?php echo $exp['description']; ?></td>
                                                                    <td>
                                                                        <a href="edit-experience.php?id=<?php echo $exp['id']; ?>">
                                                                            <button class="btn btn-primary btn-sm all-icon fa fa-pencil"></button>
                                                                        </a> 
                                                                        |
                                                                        <a href="arrange-experience.php">
                                                                            <button class="btn btn-warning btn-sm all-icon fa fa-random"></button>
                                                                        </a> 
                                                                        | 
                                                                        <a href="#"> 
                                                                            <button class="btn btn-danger btn-sm all-icon fa fa-trash-o delete-experience" data-id="<?php echo $exp['id']; ?>"></button>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            include './footer.php';
            ?>
        </section>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/common-scripts.js"></script>
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="delete/js/experience.js" type="text/javascript"></script>
        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script>
        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: "#description",
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
