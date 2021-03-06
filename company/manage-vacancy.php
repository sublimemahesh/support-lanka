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
            .col-md-3 {
                padding-bottom: 20px !important;
                height: 280px !important;

            }
            .uploadbox {
                height: 225px;
                padding-top: 15px;
            }
            .panel-body{
                padding-top: 25px;
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
                                <div class="panel-heading"><i class="fa fa-save"></i> Manage Vacancy</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="table-responsive">
                                            <div class="col-md-3 row-pad">
                                                <a href="add-vacancy.php">
                                                    <div class="uploadbox uploadphotobx" id="uploadphotobx">
                                                        <i class="fa fa-plus plus-icon" aria-hidden="true"></i>
                                                        <label class="uploadBox">Click Here To Add Your Vacancy

                                                        </label>
                                                    </div>
                                                </a>
                                            </div> 

                                            <?php
                                            $VACANCY = new Vacancy(NULL);

                                            foreach ($VACANCY->GetVacancyByCompany($_SESSION['id_com']) as $key => $vacan) {
                                                ?>
                                                
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-md-3" id="div_<?php echo $vacan['id']; ?>">
                                                    <div class="box2 text-center">
                                                        <div class="" style="height: 35px;">
                                                            <b><?php echo $vacan['title']; ?></b>
                                                        </div>
                                                        <div class="info">
                                                            <h5 class="text-justify"><b>Designation</b> :<?php echo $vacan['designation']; ?></h5>
                                                            <div class="" style="height: 25px;">
                                                                <h5 class="text-justify"><b>Job Type</b> :<?php echo $vacan['job_type']; ?></h5>
                                                            </div>
                                                            <div class="" style="height: 15px;">
                                                                <h5 class="text-justify"><b>Maximum Age : </b> <?php echo $vacan['age']; ?></h5>
                                                            </div>
                                                            <div class="" style="height: 15px;">
                                                                <h5 class="text-justify"><b>Gender : </b> <?php echo $vacan['gender']; ?></h5>
                                                            </div>
                                                            <div class="" style="height: 15px;">
                                                                <h5 class="text-justify"><b>Deadline : </b> <?php echo $vacan['deadline']; ?></h5>
                                                            </div>
                                                            <div class=" text-right" style="padding-top: 4px;">
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