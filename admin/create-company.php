<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
?>

<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Add New Company || Admin || Support Lanka</title>
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
                                <h2>Add New Company</h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-company.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class=""  method="post" action="post-and-get/company.php" enctype="multipart/form-data"> 
                                    <!--name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="name" class="hidden-lg hidden-md">Name</label>
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Member name" autocomplete="off" name="name" required="TRUE">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!-- Industry-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Industry">Industry</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Industry" class="hidden-lg hidden-md">Industry  </label>
                                                    <select class="form-control place-select1 show-tick" autocomplete="off" type="text" id="industry" autocomplete="off" name="industry" required="TRUE">
                                                        <option value=""> -- Please Select -- </option>
                                                        <?php foreach (Industry::all() as $key => $industry) {
                                                            ?>
                                                            <option value="<?php echo $industry['id']; ?>"><?php echo $industry['name']; ?></option><?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Districts-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="District">District</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line  p-top ">
                                                    <label for="District" class="hidden-lg hidden-md">District  </label>
                                                    <select class="form-control" type="text" id="district" autocomplete="off" name="district">
                                                        <option value="<?php $MEMBER->city ?>" class="active light-c"> -- Please  Select Your District -- </option>
                                                        <?php foreach (District::all() as $key => $district) {
                                                            ?>
                                                            <option value="<?php echo $district['id']; ?>"><?php echo $district['name']; ?></option>

                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--City-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="city">City</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line  p-top ">
                                                    <label for="city" class="hidden-lg hidden-md">City  </label>
                                                    <select class="form-control" autocomplete="off" type="text" id="city-bar" autocomplete="off" name="city" required="TRUE">
                                                        <option value=""> -- Please Select a District First -- </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Company Register Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Company Register Number">Company Register Number </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top">
                                                    <label for="Company Register Number" class="hidden-lg hidden-md">Company Register Number  </label>
                                                    <input type="text" id="company_register_number" class="form-control" placeholder="Enter Company Register Number" autocomplete="off" name="company_register_number" required="TRUE">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Address-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Address">Address</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line  p-top ">
                                                    <label for="Address" class="hidden-lg hidden-md">Address  </label>
                                                    <input type="text" id="address" class="form-control" placeholder="Enter Address" autocomplete="off" name="address" required="TRUE">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Contact Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for=" Contact Number"> Contact Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line  p-top ">
                                                    <label for=" Contact Number" class="hidden-lg hidden-md"> Contact Number  </label>
                                                    <input type="text" id="contact_number" class="form-control" placeholder="Enter Contact Number" autocomplete="off" name="contact_number" required="TRUE">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Email-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Email">Email</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line  p-top ">
                                                    <label for="Email" class="hidden-lg hidden-md">Email  </label>
                                                    <input type="text" id="email" class="form-control" placeholder="Enter Email" autocomplete="off" name="email" required="TRUE">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Since-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Since Company">Since Company</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line  p-top ">
                                                    <label for="Since Company" class="hidden-lg hidden-md">Since Company  </label>
                                                    <input type="text" id="since" class="form-control" placeholder="When is company start" autocomplete="off" name="since" required="TRUE">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--No Of Employees In your Company-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="no of employees">Number of Employees</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line  p-top ">
                                                    <label for="city" class="hidden-lg hidden-md">NO of Employees </label>
                                                    <input type="text" id="team_size" class="form-control" placeholder="No Of Employees" autocomplete="off" name="team_size" required="TRUE">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--About Company-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="about me">About Us</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line  p-top ">
                                                    <label for="about me" class="hidden-lg hidden-md">About us  </label>
                                                    <textarea id="about" name="about" class="form-control" rows="5"></textarea> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Profile Picture-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="image">Image In Company</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line  p-top ">
                                                    <label for="image" class="hidden-lg hidden-md">Image in Company  </label>
                                                    <input type="file" id="image" class="form-control" name="image" required="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Rank-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="rank">Rank</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line  p-top ">
                                                    <label for="rank" class="hidden-lg hidden-md">Rank  </label>
                                                    <select class="form-control place-select1 show-tick" autocomplete="off" type="text" id="rank" autocomplete="off" name="rank" required="TRUE">
                                                        <option value=""> -- Please Select -- </option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Password-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line  p-top ">
                                                    <label for="password" class="hidden-lg hidden-md">Password  </label>
                                                    <input type="password" id="password" class="form-control" placeholder="Enter password" autocomplete="off" name="password" required="TRUE">
                                                    <input type="hidden" value="1" name="status">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5"> 

                                            <input type="submit" name="create_company" class="btn btn-primary m-t-15 waves-effect" value="Add Company"/>
                                        </div>
                                    </div>
                                    <hr/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Vertical Layout -->

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
        <script src="js/city.js" type="text/javascript"></script>
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