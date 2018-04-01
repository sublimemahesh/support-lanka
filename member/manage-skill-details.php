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

        <title>Skill Detail || My Account || Support Lanka</title>

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
                                <div class="panel-heading"><i class="fa fa-save"></i> Manage Skill Details</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="body">
                                            <div class="table-responsive">
                                                <div>
                                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Industry</th>
                                                                <th>skill</th>
                                                                <th>percentage</th>
                                                                <th>description</th>
                                                                <th>Option</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $SKILLDETAILS = SkillDetail::GetSkillByMember($_SESSION['id']);
                                                            foreach ($SKILLDETAILS as $key => $skill_d) {
                                                                ?>
                                                                <tr id="row_<?php echo $skill_d['id']; ?>">
                                                                    <td><?php echo $skill_d['id']; ?></td> 
                                                                    <td>
                                                                        <?php
                                                                        $SKILL = new Skill($skill_d['skill']);
                                                                        $INDUSTRY = new Industry($SKILL->industry);
                                                                        echo $INDUSTRY->name;
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        echo $SKILL->name;
                                                                        ?>
                                                                    </td> 
                                                                    <td><?php echo $skill_d['percentage']; ?></td>
                                                                    <td><?php echo $skill_d['description']; ?></td>
                                                                    <td>  
                                                                        <a href="edit-skill-detail.php?id=<?php echo $skill_d['id']; ?>">
                                                                            <button class="btn btn-primary btn-sm all-icon fa fa-pencil"></button>
                                                                        </a> |
                                                                        <a href="add-experience.php?skill=<?php echo $skill_d['id']; ?>">
                                                                            <button class="btn btn-warning btn-sm all-icon fa fa-book"></button>
                                                                        </a> |
                                                                        <a href="#"> 
                                                                            <button class="btn btn-danger btn-sm all-icon fa fa-trash-o delete-skill-detail" data-id="<?php echo $skill_d['id']; ?>"></button>
                                                                        </a> 
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?> 
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Industry</th>
                                                                <th>skill</th>
                                                                <th>percentage</th> 
                                                                <th>description</th>
                                                                <th>Option</th>
                                                            </tr>
                                                        </tfoot> 
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
        <script src="delete/js/skill-detail.js" type="text/javascript"></script>
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
