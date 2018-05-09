<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>My Profile || Support Lanka</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Ruda:400,700,900" type="text/css">

        <!-- Custom styles for this template --> 
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
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
                        <div class="row top-bott20">
                            <?php
                            if (isset($_GET['message'])) {
                                $message = new Message($_GET['message']);
                                ?>
                                <div class="alert alert-success"><?php echo $message->description; ?></div>

                                <?php
                            }
                            ?>
                            <div class="row" id="new-p-icon" >
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <a href="edit-profile.php">
                                        <div class="box">
                                            <div class="box-icon">
                                                <span class="fa fa-user-circle"></span>
                                            </div>
                                            <div class="info">
                                                <h4 class="text-center">Edit My Profile</h4>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <a href="manage-education.php">
                                        <div class="box">
                                            <div class="box-icon">
                                                <span class="fa fa-graduation-cap"></span>
                                            </div>
                                            <div class="info">
                                                <h4 class="text-center">My  Education</h4>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <a href="manage-skill-details.php">
                                        <div class="box">
                                            <div class="box-icon">
                                                <span class="fa fa-shirtsinbulk"></span>
                                            </div>
                                            <div class="info">
                                                <h4 class="text-center">My Skill</h4>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row" id="new-p-icon-2">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <a href="manage-experience.php">
                                        <div class="box">
                                            <div class="box-icon">
                                                <span class="fa fa-etsy"></span>
                                            </div>
                                            <div class="info">
                                                <h4 class="text-center">My Experience</h4>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <a href="manage-portfolio.php">
                                        <div class="box">
                                            <div class="box-icon">
                                                <span class="fa fa-product-hunt"></span>
                                            </div>
                                            <div class="info">
                                                <h4 class="text-center">MY Portfolio</h4>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <a href="manage-award.php">
                                        <div class="box">
                                            <div class="box-icon">
                                                <span class="fa fa-trophy"></span>
                                            </div>
                                            <div class="info">
                                                <h4 class="text-center">My Award</h4>

                                            </div>
                                        </div>
                                    </a>
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

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <!--custom switch-->
        <script src="assets/js/bootstrap-switch.js"></script>

        <!--custom tagsinput-->
        <script src="assets/js/jquery.tagsinput.js"></script>

        <!--custom checkbox & radio-->
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/date.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker-2.html"></script>

        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

        <script src="assets/js/form-component.js"></script>    
        <script src="js/profile.js" type="text/javascript"></script>
        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script>

    </body>

</html>
