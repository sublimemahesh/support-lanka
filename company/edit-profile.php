<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

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

        <title>Edit Profile || Support Lanka</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />

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
                        <div class="row top-bott20">
                            <?php
                            if (isset($_GET['message'])) {

                                $MESSAGE = New Message($_GET['message']);
                                ?>
                                <div class="alert alert-<?php echo $MESSAGE->status; ?>" role = "alert">
                                    <?php echo $MESSAGE->description; ?>
                                </div>
                                <?php
                            }
                            ?>

                            <?php
                            $vali = new Validator();

                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Change Your Details</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <form method="post" action="post-and-get/company.php" enctype="multipart/form-data">
                                                    <div class="col-md-12 top-bott50">
                                                        <div class="col-md-8">
                                                            <!--Full Name-->
                                                            <div class="">
                                                                <div class="bottom-top">Full Name</div>
                                                                <div class="">
                                                                    <input type="text" name="name" class="form-control" placeholder="Please Enter Your Full Name"  value="<?php echo $COMPANY->name; ?>" required="TRUE">
                                                                </div>
                                                            </div>
                                                            <!--User Name-->
                                                            <div class="">
                                                                <div class="bottom-top">User Name</div>
                                                                <div class="">
                                                                    <input type="text" name="username" class="form-control" placeholder="Please Enter Your User Name" required="TRUE" value="<?php echo $COMPANY->username; ?>">
                                                                </div>
                                                            </div>
                                                            <!--Email-->
                                                            <div class="">
                                                                <div class="bottom-top">Email</div>
                                                                <div class="">
                                                                    <input type="email" name="email" class="form-control" placeholder="Please Enter Your Email" required="TRUE" value="<?php echo $COMPANY->email; ?>">
                                                                </div>
                                                            </div>
                                                            <!--Contact No-->
                                                            <div class="">
                                                                <div class="bottom-top">Contact No</div>
                                                                <div class="">
                                                                    <input type="text" name="contact_number" class="form-control" placeholder="Please Enter Your Contact Number" required="TRUE" value="<?php echo $COMPANY->contact_number; ?>">
                                                                </div>
                                                            </div> 
                                                            <!--Company Register No-->
                                                            <div class="">
                                                                <div class="bottom-top">Company Register No</div>
                                                                <div class="">
                                                                    <input type="text" name="company_register_number" class="form-control" placeholder="Please Enter Company Register No" required="TRUE" value="<?php echo $COMPANY->company_register_number; ?>">
                                                                </div>
                                                            </div> 
                                                            <!--Since-->
                                                            <div class="">
                                                                <div class="bottom-top">Since</div>
                                                                <div class="">
                                                                    <input type="text" id="since" name="since" class="form-control" placeholder="When is company start" required="TRUE" value="<?php echo $COMPANY->since; ?>">
                                                                </div>
                                                            </div> 
                                                            <!--Team size-->
                                                            <div class="">
                                                                <div class="bottom-top">No Of Employees In your Company</div>
                                                                <div class="">
                                                                    <input type="text" name="team_size" class="form-control" placeholder="No Of Employees" required="TRUE" value="<?php echo $COMPANY->team_size; ?>">
                                                                </div>
                                                            </div> 
                                                            <!--Map-->
                                                            <div class="">
                                                                <div class="bottom-top">Company Location(MAP)</div>
                                                                <div class="">
                                                                    <input type="text" name="map" class="form-control" placeholder="Company Location" required="TRUE" value="<?php echo $COMPANY->map; ?>">
                                                                </div>
                                                            </div> 
<!--                                                             <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15870.908119536647!2d80.205695!3d6.032151!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4768397502edf93!2sSublime+Holdings!5e0!3m2!1sen!2slk!4v1522306176522" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                                                            <!--About Me-->
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="about">About Company Details</label>
                                                                </div>
                                                                <div class="">
                                                                    <textarea type="text" id="about" name="about" class="form-control" placeholder="Please Enter About Company Details"><?php echo $COMPANY->about; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <!--Home Address-->
                                                            <div class="">
                                                                <div class="bottom-top">Company Address</div>
                                                                <div class="">
                                                                    <input type="text" name="address" class="form-control" placeholder="Please Enter Company Address" required="TRUE" value="<?php echo $COMPANY->address; ?>">
                                                                </div>
                                                            </div>
                                                            <!--City-->
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="city">City</label>
                                                                </div>
                                                                <div class="">
                                                                    <select class="form-control" type="text" id="city" autocomplete="off" name="city">
                                                                        <option value="<?php $COMPANY->id ?>" class="active light-c">
                                                                            <?php
                                                                            $CITY = new City($COMPANY->city);
                                                                            echo $CITY->name;
                                                                            ?>
                                                                        </option>
                                                                        <?php foreach (City::all() as $key => $city) {
                                                                            ?>
                                                                            <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--Industry-->
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="industry">Industry</label>
                                                                </div>
                                                                <div class="">
                                                                    <select class="form-control" type="text" id="industry" autocomplete="off" name="industry">
                                                                        <option value="<?php $COMPANY->id ?>" class="active light-c">
                                                                            <?php
                                                                            $INDUSTRY = new Industry($COMPANY->industry);
                                                                            echo $INDUSTRY->name;
                                                                            ?>
                                                                        </option>
                                                                        <?php foreach (Industry::all() as $key => $industry) {
                                                                            ?>
                                                                            <option value="<?php echo $industry['id']; ?>"><?php echo $industry['name']; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div> 
                                                        <div class="col-md-4">
                                                            <div>
                                                                <div class="bottom-top">Change Your Profile Picture</div>
                                                                <div>
                                                                    <?php
                                                                    if (empty($COMPANY->logo_image)) {
                                                                        ?>
                                                                        <img src="../upload/company/logo.png" class="img img-responsive img-thumbnail"/> 
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <img src="../upload/company/<?php echo $COMPANY->logo_image; ?>" class="img img-responsive img-thumbnail"/> 
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <input type="file" id="logo_image" class="" name="logo_image">
                                                                <input type="hidden" name="logo_image_name" value="<?php echo $COMPANY->logo_image; ?>"/> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="id" value="<?php echo $COMPANY->id; ?>" name="id"/>
                                                                <button type="submit" name="update" class="btn btn-info center-block">Save Changes</button>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </form>
                                                <br>

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
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
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


        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script>
        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: "#about",
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
