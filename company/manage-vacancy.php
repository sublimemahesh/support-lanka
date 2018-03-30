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

        <title>Vacancy || Company || Support Lanka </title>

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


                                                <?php
                                                $VACANCY = new Vacancy(NULL);

                                                foreach ($VACANCY->GetVacancyByCompany($_SESSION['id_com']) as $key => $vacan) {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div id="div_<?php echo $vacan['id']; ?>">
                                                            <div><?php echo $vacan['sort']; ?></div>
                                                            <div><b>Title : </b><?php echo $vacan['title']; ?></div>
                                                            <div><b>Designation : </b><?php echo $vacan['designation']; ?></div>
                                                            <div><b>Salary : </b><?php echo $vacan['salary']; ?></div>
                                                            <div><b>Maximum Age : </b><?php echo $vacan['age']; ?></div>
                                                            <div><b>Gender : </b><?php echo $vacan['gender']; ?></div>
                                                            <div><b>Deadline : </b><?php echo $vacan['deadline']; ?></div>
                                                            <div><b>Job Type : </b><?php echo $vacan['job_type']; ?></div>
                                                            <div>
                                                                <a href="edit-vacancy.php?id=<?php echo $vacan['id']; ?>">
                                                                    <button class="btn btn-primary btn-sm all-icon fa fa-pencil"></button>
                                                                </a> 
                                                                |
                                                                <a href="arrange-vacancy.php">
                                                                    <button class="btn btn-warning btn-sm all-icon fa fa-random"></button>
                                                                </a> 
                                                                | 
                                                                <a href="#"> 
                                                                    <button class="btn btn-danger btn-sm all-icon fa fa-trash-o delete-vacancy" data-id="<?php echo $vacan['id']; ?>"></button>
                                                                </a>
                                                            </div>
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
        <script src="delete/js/vacancy.js" type="text/javascript"></script>
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
