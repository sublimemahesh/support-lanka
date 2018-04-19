<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');

$COMPANY = new Company($_SESSION['id_com']);
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Company Profile || Support Lanka</title>

        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />

        <link href="http://fonts.googleapis.com/css?family=Ruda:400,700,900" type="text/css">

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
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-user"></i>   My Profile</div>
                                <div class="panel-body">  <div class="body">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="row">
                                                <div class="col-sm-9 col-md-9">
                                                    <ul class="list-group">
                                                        <li class="list-group-item"><b>Name</b> : <?php echo $COMPANY->name; ?></li> 
                                                        <li class="list-group-item"><b>Email</b> : <?php echo $COMPANY->email; ?></li>
                                                        <li class="list-group-item"><b>Contact No</b> : <?php echo $COMPANY->contact_number; ?></li>
                                                        <li class="list-group-item"> <b>Company Register Number</b> : <?php echo $COMPANY->company_register_number; ?></li>
                                                        <li class="list-group-item"> <b>Address</b> : <?php echo $COMPANY->address; ?></li>
                                                        <li class="list-group-item"> <b>About Me</b> : <?php echo $COMPANY->about; ?></li>
                                                        <li class="list-group-item"> <b>Since</b> : <?php echo $COMPANY->since; ?></li>
                                                        <li class="list-group-item"> <b>No Of Employees</b> : <?php echo $COMPANY->team_size; ?></li>
                                                        <li class="list-group-item"> <b>Views</b> : <?php echo $COMPANY->views; ?></li>
                                                        <li class="list-group-item"> <b>City</b> :
                                                            <?php
                                                            $CITY = new City($COMPANY->city);
                                                            echo $CITY->name;
                                                            ?>
                                                        </li>
                                                        <li class="list-group-item"> <b>Industry</b> :
                                                            <?php
                                                            $INDUSTRY = new Industry($COMPANY->industry);
                                                            echo $INDUSTRY->name;
                                                            ?>
                                                        </li>
                                                        <!--<li class="list-group-item"> <b>Last Login</b> : </li>--> 
                                                    </ul>
                                                </div>

                                                <div class="col-sm-3 col-md-3">  
                                                    <?php
                                                    if (empty($COMPANY->logo_image)) {
                                                        ?>
                                                        <img src="../upload/company/logo.png" class="img img-responsive img-thumbnail" id="logo_image"/>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="../upload/company/<?php echo $COMPANY->logo_image; ?>" class="img img-responsive img-thumbnail" id="logo_image"/>
                                                        <?php
                                                    }
                                                    ?>
                                                    <form class="form-horizontal"  method="post" enctype="multipart/form-data" id="upForm">
                                                        <input type="file" name="logo-image" id="logo-image" />
                                                        <input type="hidden" name="upload-logo-image" id="upload-logo-image"/>
                                                        <input type="hidden" name="company" id="company" value="<?php echo $COMPANY->id; ?>"/>
                                                    </form>

                                                    <div class="company-map">
                                                        <iframe src="<?php echo $COMPANY->map ?>" width="245" height="270" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                    </div>
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
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
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
