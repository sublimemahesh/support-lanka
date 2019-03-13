<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$COMPANY = new Company($id);
?> 
﻿<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Edit Company || Admin || Support Lanka</title>

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
                                    Edit Company
                                </h2>
                            </div>
                            <div class="body row">
                                <form class="" method="post" action="post-and-get/company.php" enctype="multipart/form-data"> 
                                    <!--Name-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Name" class="hidden-lg hidden-md">Name</label>
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Company name" autocomplete="off" name="name" required="TRUE" value="<?php echo $COMPANY->name; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Company Register Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Register Number">Register Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Register Number" class="hidden-lg hidden-md">Register Number</label>
                                                    <input type="text" id="company_register_number" class="form-control" placeholder="Enter Company Register Number" autocomplete="off" name="company_register_number" required="TRUE" value="<?php echo $COMPANY->company_register_number; ?>">
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
                                                <div class="form-line p-top ">
                                                    <label for="Address" class="hidden-lg hidden-md">Address</label>
                                                    <input type="text" id="address" class="form-control" placeholder="Enter Address" autocomplete="off" name="address" required="TRUE" value="<?php echo $COMPANY->address; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- industry-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Category">Category</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Category" class="hidden-lg hidden-md">Category</label>
                                                    <select class="form-control show-tick place-select1" type="text" id="industry" autocomplete="off" name="industry" required="TRUE">
                                                        <option value="<?php echo $COMPANY->id; ?>" class="active light-c">
                                                            <?php
                                                            $INDUSTRY = new Industry($COMPANY->industry);
                                                            echo $INDUSTRY->name;
                                                            ?>
                                                        </option>
                                                        <?php foreach (Industry::all() as $key => $ind) {
                                                            ?>
                                                            <option value="<?php echo $ind['id']; ?>"><?php echo $ind['name']; ?></option><?php
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
                                            <label for="Districts">Districts</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 p-bottom">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="Districts" class="hidden-lg hidden-md">Districts</label>
                                                    <select class="form-control" type="text" id="district" autocomplete="off" name="district">
                                                        <?php
                                                        $CITY = new City(NULL);
                                                        $DISTRICT = new District(NULL);

                                                        foreach ($CITY->getDistrictByCityId($COMPANY->city) as $key => $district) {

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
                                                    <select class="form-control" autocomplete="off" type="text" id="city-bar" autocomplete="off" name="city" required="TRUE">
                                                        <?php
                                                        $CITY = new City(NULL);
                                                        foreach ($CITY->all() as $key => $city) {
                                                            if ($city['id'] == $COMPANY->city) {
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

                                    <!--Contact Number-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Contact Number">Contact Number</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Contact Number" class="hidden-lg hidden-md">Contact Number</label>
                                                    <input type="text" id="contact_number" class="form-control" placeholder="Enter Contact Number" autocomplete="off" name="contact_number" required="TRUE" value="<?php echo $COMPANY->contact_number; ?>">
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
                                                <div class="form-line p-top ">
                                                    <label for=" Email" class="hidden-lg hidden-md"> Email</label>
                                                    <input type="text" id="email" class="form-control" placeholder="Enter Email" autocomplete="off" name="email" required="TRUE" value="<?php echo $COMPANY->email; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--Since-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Since">Since</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for=" Since" class="hidden-lg hidden-md"> Since</label>
                                                    <input type="text" id="since" class="form-control" placeholder="When is company start" autocomplete="off" name="since" required="TRUE" value="<?php echo $COMPANY->since; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--No Of Employees In your Company-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="team_sizee">No Of Employees In your Company</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for=" team_sizee" class="hidden-lg hidden-md"> No Of Employees In your Company</label>
                                                    <input type="text" id="team_size" class="form-control" placeholder="No Of Employees" autocomplete="off" name="team_size" required="TRUE" value="<?php echo $COMPANY->team_size; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <!--About Company-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="About Company">About Company</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for=" About Company" class="hidden-lg hidden-md">About Company</label>

                                                    <textarea id="about" name="about" class="form-control" rows="5"><?php echo $COMPANY->about; ?></textarea> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Logo Image-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Company Logo Image ">Company Logo Image </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for=" Company Logo Image" class="hidden-lg hidden-md"> Company Logo Image</label>

                                                    <?php
                                                    if ($COMPANY->logo_image == NULL) {
                                                        ?>
                                                        <img src="../upload/member/member.png" style="width:15%;" class="img-thumbnail">
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <input type="file" id="logo_image" class="form-control" name="logo_image" value="<?php echo $COMPANY->logo_image; ?>">
                                                        <img src="../upload/company/<?php echo $COMPANY->logo_image; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image">

                                                        <?php
                                                    }
                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Rank-->
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="Rank">Rank </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padd-bottom">
                                            <div class="form-group">
                                                <div class="form-line p-top ">
                                                    <label for="Rank" class="hidden-lg hidden-md"> Rank</label>
                                                    <select class="form-control place-select1 show-tick" autocomplete="off" type="text" id="rank" autocomplete="off" name="rank" required="TRUE">
                                                        <option value="<?php echo $COMPANY->rank; ?>" selected=""><?php echo $COMPANY->rank; ?></option>

                                                        <?php
                                                        if ($COMPANY->rank == 1) {
                                                            ?>

                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <?php
                                                        } else if ($COMPANY->rank == 2) {
                                                            ?>
                                                            <option value="1">1</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>

                                                            <?php
                                                        } else if ($COMPANY->rank == 3) {
                                                            ?>
                                                            <option value="1">1</option>                                                          
                                                            <option value="2">2</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>

                                                            <?php
                                                        } else if ($COMPANY->rank == 4) {
                                                            ?>
                                                            <option value="1">1</option>                                                          
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                             <option value="5">5</option>

                                                            <?php
                                                        } else if ($COMPANY->rank == 5) {
                                                            ?>
                                                             
                                                            <option value="1">1</option>                                                          
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>                                                          
                                                            <option value="4">4</option>
                                                          
                                                            <?php
                                                        }  
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-2"></div>  
                                        <div class="form-group">
                                            <input class="filled-in chk-col-pink" type="checkbox" 
                                            <?php
                                            if ($COMPANY->status == 1) {
                                                echo 'checked';
                                            }
                                            ?> 
                                                   name="active" value="1" id="rememberme" />
                                            <label for="rememberme">Active</label>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                <input type="hidden" id="image" value="<?php echo $COMPANY->logo_image; ?>" name="image"/>
                                                <input type="hidden" id="id" value="<?php echo $COMPANY->id; ?>" name="id"/>

                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="update_company" value="update">Save Changes</button>
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