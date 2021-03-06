﻿<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$MEMBER = new Member($id);
?> 
﻿<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Edit Member || Admin || Support Lanka</title>

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
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>

        <section class="content">
            <div class="container-fluid"> 
                <!-- Body Copy -->
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Edit Member
                                </h2>
                            </div>
                            <div class="body row">
                                <form class="" method="post" action="post-and-get/member.php" enctype="multipart/form-data"> 
                                    <!--user Name-->

                                    <!--Password-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Password">Password</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Password" class="hidden-lg hidden-md">Password</label>
                                                    <input type="password" id="password" class="form-control"  autocomplete="off" name="password"  placeholder="Enter the password" value="<?php echo $MEMBER->password; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Name">Name<label style="color: red"> *</label></label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Name" class="hidden-lg hidden-md">Name</label>
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Member name" autocomplete="off" name="name"  value="<?php echo $MEMBER->name; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Email-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Email">Email <label style="color: red"> *</label></label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Email" class="hidden-lg hidden-md">Email</label>
                                                    <input type="email" id="email" class="form-control" placeholder="Enter Email" autocomplete="off" name="email"  value="<?php echo $MEMBER->email; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Contact Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Contact Number">Contact Number <label style="color: red"> *</label></label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Contact Number" class="hidden-lg hidden-md">Contact Number</label>
                                                    <input type="text" id="contact_number" class="form-control" placeholder="Enter contact number" autocomplete="off" name="contact_number"  value="<?php echo $MEMBER->contact_number; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--NIC Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="nic-number">NIC Number <label style="color: red"> *</label></label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="nic-number" class="hidden-lg hidden-md">NIC Number</label>
                                                    <input type="text" id="nic_number" class="form-control" placeholder="Enter NIC number" autocomplete="off" name="nic_number"  value="<?php echo $MEMBER->nic_number; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--About Your Details-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="about">About</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="about" class="hidden-lg hidden-md">About</label>
                                                    <textarea id="about_me" name="about_me" class="form-control" rows="5" ><?php echo $MEMBER->about_me; ?></textarea> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Home Address-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Address">Address</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Address" class="hidden-lg hidden-md">Address</label>
                                                    <input type="text" id="home_address" class="form-control" placeholder="Enter Home Address" autocomplete="off" name="home_address"  value="<?php echo $MEMBER->home_address; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Districts-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Districts">Districts</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Districts" class="hidden-lg hidden-md">Districts</label>
                                                    <select class="form-control" type="text" id="district" autocomplete="off" name="district">

                                                        <?php
                                                        $CITY = new City(NULL);
                                                        $DISTRICT = new District(NULL);

                                                        foreach ($CITY->getDistrictByCityId($MEMBER->city) as $key => $district) {

                                                            foreach ($DISTRICT->all() as $district_all) {
                                                                if ($district['district'] == $district_all['id']) {
                                                                    ?>
                                                                    <option value="<?php echo $district_all['id']; ?>" selected=""><?php echo $district_all['name']; ?></option>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <option value="<?php echo $district_all['id']; ?>"><?php echo $district_all['name']; ?></option>
                                                                    <?php
                                                                }
                                                            }
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
                                                    <select class="form-control" autocomplete="off" type="text" id="city-bar" autocomplete="off" name="city" >
                                                        <?php
                                                        $CITY = new City(NULL);
                                                        foreach ($CITY->all() as $key => $city) {
                                                            if ($city['id'] == $MEMBER->city) {
                                                                ?>
                                                                <option value="<?php echo $city['id']; ?>" selected=""><?php echo $city['name']; ?></option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $city['id']; ?>" ><?php echo $city['name']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--date_of_birthday-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="date_of_birth">Date of Birth</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="date_of_birth" class="hidden-lg hidden-md">Date of Birth</label>
                                                    <input type="text" id="date_of_birthday" class="form-control datepicker" value="<?php echo $MEMBER->date_of_birthday; ?>" autocomplete="off" name="date_of_birthday" >
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Profile Picture-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Profile_image">Profile Image</label>
                                        </div> 
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="  p-top ">
                                                    <label for="Profile_image" class="hidden-lg hidden-md">Profile Image</label>
                                                    <input type="file" id="image" class="form-control" value="<?php echo $MEMBER->profile_picture; ?>"  name="image">
                                                    <?php if (empty($MEMBER->profile_picture)) { ?>
                                                        <img src="../upload/member/member.png" style="width:15%;" class="img-thumbnail">

                                                    <?php } else { ?>
                                                        <img src="../upload/member/<?php echo $MEMBER->profile_picture; ?>"   class="view-edit-img img img-responsive img-thumbnail"  alt="old image">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <!--Rank-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Rank">Rank</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Rank" class="hidden-lg hidden-md">Rank</label>
                                                    <select class="form-control place-select1 show-tick" autocomplete="off" type="text" id="rank" autocomplete="off" name="rank" >
                                                        <?php
                                                        if ($MEMBER->rank == 1) {
                                                            ?>
                                                            <option value="<?php echo $MEMBER->rank; ?>" selected=""><?php echo $MEMBER->rank; ?></option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <?php
                                                        } else if ($MEMBER->rank == 2) {
                                                            ?>
                                                            <option value="1">1</option>
                                                            <option value="<?php echo $MEMBER->rank; ?>" selected=""><?php echo $MEMBER->rank; ?></option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>

                                                            <?php
                                                        } else if ($MEMBER->rank == 3) {
                                                            ?>
                                                            <option value="1">1</option>                                                          
                                                            <option value="2">2</option>
                                                            <option value="<?php echo $MEMBER->rank; ?>" selected=""><?php echo $MEMBER->rank; ?></option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>

                                                            <?php
                                                        } else if ($MEMBER->rank == 4) {
                                                            ?>
                                                            <option value="1">1</option>                                                          
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="<?php echo $MEMBER->rank; ?>" selected=""><?php echo $MEMBER->rank; ?></option>
                                                            <option value="5">5</option>

                                                            <?php
                                                        } else if ($MEMBER->rank == 5) {
                                                            ?>
                                                            <option value="1">1</option>                                                          
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>                                                          
                                                            <option value="4">4</option>
                                                            <option value="<?php echo $MEMBER->rank; ?>" selected=""><?php echo $MEMBER->rank; ?></option>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="1">1</option>                                                          
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>                                                          
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <?php
                                                        }
                                                        ?>


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
                                                        <?php
                                                        if ($MEMBER->privacy == 1) {
                                                            ?>
                                                            <option value="1" selected="">Public</option>

                                                            <option value="2">Private</option>
                                                            <?php
                                                        } else if ($MEMBER->privacy == 2) {
                                                            ?>
                                                            <option value="2" selected="">Private</option>

                                                            <option value="1"  >Public</option>
                                                            <?php
                                                        }
                                                        ?>


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
                                                        <?php
                                                        if ($MEMBER->job_type == 1) {
                                                            ?>
                                                            <option value="1" selected="">Part Time</option>
                                                            <option value="2">Full Time</option>
                                                            <?php
                                                        } else if ($MEMBER->job_type == 2) {
                                                            ?>
                                                            <option value="2" selected="">Full Time</option> 
                                                            <option value="1" >Part Time</option>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <option value="1">Part Time</option>
                                                            <option value="2">Full Time</option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Activity-->
                                    <div class="col-md-12">
                                        <div class="col-md-2"></div>  
                                        <div class="form-group">
                                            <input class="filled-in chk-col-pink" type="checkbox" <?php
                                            if ($MEMBER->is_active == 1) {
                                                echo 'checked';
                                            }
                                            ?> name="active" value="1" id="rememberme" />
                                            <label for="rememberme" style="font-size: 20px;">Active</label>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                <input type="hidden" id="oldImageName" value="<?php echo $MEMBER->profile_picture; ?>" name="oldImageName"/>
                                                <input type="hidden" id="id" value="<?php echo $MEMBER->id; ?>" name="id"/>
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="update" value="update">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
        <script src="js/add-new-ad.js" type="text/javascript"></script>
        <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="js/city.js" type="text/javascript"></script>
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