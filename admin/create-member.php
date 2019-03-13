<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                <div class="card">
                    <div class="header">
                        <h2>Add New Member</h2>
                        <ul class="header-dropdown">
                            <li class="">
                                <a href="manage-member.php">
                                    <i class="material-icons">list</i> 
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form class="" id="member-data" method="post"  enctype="multipart/form-data"> 
                            <!--name-->
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="name">Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="name" class="hidden-lg hidden-md">Name</label>
                                            <input type="text" id="name" class="form-control" placeholder="Enter Member name" autocomplete="off" name="name" >
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="Username">Username</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Username" class="hidden-lg hidden-md">Username</label>
                                            <input name="username" class="form-control inputbox" type="text" placeholder="Enter the username"  >

                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Email-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="email" class="hidden-lg hidden-md">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" autocomplete="off" name="email" >
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Contact Number-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="contact number">Contact Number</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="contact number" class="hidden-lg hidden-md">contact number</label>
                                            <input type="text" id="contact_number" class="form-control" placeholder="Enter contact number" autocomplete="off" name="contact_number" >
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--NIC Number-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="Enter NIC number">Enter NIC Number</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Enter NIC number" class="hidden-lg hidden-md">Enter NIC Number</label>
                                            <input type="text" id="nic_number" class="form-control" placeholder="Enter NIC number" autocomplete="off" name="nic_number"/>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Home Address-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="Address">Home Address</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Address" class="hidden-lg hidden-md">Home Address</label>
                                            <input type="text" id="home_address" class="form-control" placeholder="Enter Home Address" autocomplete="off" name="home_address" >
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Districts-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="Districts">Districts</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Districts" class="hidden-lg hidden-md">Districts</label>
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
                                    <label for="City">City</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="City" class="hidden-lg hidden-md">City</label>
                                            <select class="form-control" autocomplete="off" type="text" id="city-bar" autocomplete="off" name="city" required="TRUE">
                                                <option value=""> -- Please Select a District First -- </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--date_of_birthday-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="date_of_birthday">Date Of Birthday</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="date_of_birthday" class="hidden-lg hidden-md">Date Of Birthday</label>
                                            <input type="text" id="date_of_birthday" class="form-control datepicker" placeholder="Enter Date Of Birthday" autocomplete="off" name="date_of_birthday" >
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--About Your Details-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="about_me">About Me</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="about_me" class="hidden-lg hidden-md">About Me</label>
                                            <textarea  name="about_me" class="form-control" rows="5" autocomplete="off" id="about_me"></textarea> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Profile Picture-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="Image Profile">Image Profile</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Image Profile" class="hidden-lg hidden-md">Image Profile</label>
                                            <input type="file" id="image" class="form-control" name="image" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Rank-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="Rank">Rank</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Rank" class="hidden-lg hidden-md">Rank</label>
                                            <select class="form-control place-select1 show-tick" autocomplete="off" type="text" id="rank" autocomplete="off" name="rank" required="TRUE">
                                                <option value="0"> -- Please Select -- </option> 
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
                            <!--privacy-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="Rank">Privacy</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="Privacy" class="hidden-lg hidden-md">Privacy</label>
                                            <select class="form-control  "  type="text"   name="privacy" >
                                                <option value="0" >-- Please Select the Privacy</option>
                                                <option value="1">Public</option>
                                                <option value="2">Private</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--job type-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="job type">job type</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="job type" class="hidden-lg hidden-md">job type</label>
                                            <select class="form-control  "  type="text"   name="job_type" >
                                                <option value="0" >-- Please Select the job type</option>
                                                <option value="1">Part type</option>
                                                <option value="2">Full Time</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--password-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="password" class="hidden-lg hidden-md">Password</label>
                                            <input type="password" id="password" class="form-control" placeholder="Enter password" autocomplete="off" name="password" >
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <!--Add member-->
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">  
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <input class="filled-in chk-col-pink" type="checkbox"  name="is_active" value="1" id="rememberme" />
                                        <label for="rememberme" style="font-size: 20px;">Active</label>
                                    </div>
                                </div> 

                            </div> 
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">  

                                </div>  
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="btn btn-primary m-t-15 waves-effect  pull-left" id="btnSubmit">Add member</div>
                                    <div class=" text-danger btn-padding pull-left error-mess" id="message" ></div> 
                                    <input type="hidden" name="save" value="save"/>
                                    <input type="hidden" name="status" value="1"/>
                                </div>
                            </div> 
                        </form> 
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
        <script src="js/create-member.js" type="text/javascript"></script>
        <script src="js/city.js" type="text/javascript"></script>
        <script src="plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});
            });
        </script> 
    </body>

</html>