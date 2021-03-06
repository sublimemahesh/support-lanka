<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$MEMBER = new Member($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Edit Profile || My Account || Support Lanka</title>

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
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Change My Details</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <form method="post" action="post-and-get/member.php" enctype="multipart/form-data">
                                                    <div class="col-md-12 top-bott50">
                                                        <div class="col-md-8">
                                                            <!--Full Name-->
                                                            <div class="">
                                                                <div>Full Name</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="name" class="form-control" placeholder="Please Enter Your Full Name"  value="<?php echo $MEMBER->name; ?>">
                                                                </div>
                                                            </div>

                                                            <!--Email-->
                                                            <div class="">
                                                                <div>Email</div>
                                                                <div class="formrow">
                                                                    <input type="email" name="email" class="form-control" placeholder="Please Enter Your Email" value="<?php echo $MEMBER->email; ?>">
                                                                </div>
                                                            </div>
                                                            <!--Contact No-->
                                                            <div class="">
                                                                <div>Contact No</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="contact_number" class="form-control" placeholder="Please Enter Your Contact Number" value="<?php echo $MEMBER->contact_number; ?>">
                                                                </div>
                                                            </div> 
                                                            <!--NIC Number-->
                                                            <div class="">
                                                                <div>NIC Number</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="nic_number" class="form-control" placeholder="Please Enter Your NIC Number" value="<?php echo $MEMBER->nic_number; ?>">
                                                                </div>
                                                            </div> 
                                                            <!--Date Of Birthday-->
                                                            <div class="">
                                                                <div>Date Of Birthday</div>
                                                                <div class="formrow">
                                                                    <input style="padding: 0px 12px;" type="date" name="date_of_birthday" class="form-control" placeholder="Please Enter Date Of Birthday" required="TRUE" value="<?php echo $MEMBER->date_of_birthday; ?>">
                                                                </div>
                                                            </div> 
                                                            <!--About Me-->
                                                            <div class="">
                                                                <div>
                                                                    <label for="about_me">About Your Details</label>
                                                                </div>
                                                                <div class="formrow">
                                                                    <textarea type="text" id="about_me" name="about_me" class="form-control" placeholder="Please Enter About Your Details"><?php echo $MEMBER->about_me; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <!--Home Address-->
                                                            <div class="">
                                                                <div>Home Address</div>
                                                                <div class="formrow">
                                                                    <input type="text" name="home_address" id="home_address" class="form-control" placeholder="Please Enter Home Address" required="TRUE" value="<?php echo $MEMBER->home_address; ?>">
                                                                </div>
                                                            </div>
                                                            <!--Districts-->
                                                            <div class="">
                                                                <div>
                                                                    <label for="disrict">District</label>
                                                                </div>
                                                                <div class="formrow">
                                                                    <select class="form-control" type="text" id="district" autocomplete="off" name="district">
                                                                        <option value=" " class="active light-c"> -- Please  Select Your District -- </option>
                                                                        <?php
                                                                        $CITY = new City(NULL);
                                                                        $DISTRICT = new District(NULL);

                                                                        if ($MEMBER->city == 0) {
                                                                            foreach ($DISTRICT->all() as $district_all) {
                                                                                ?>
                                                                                <option value="<?php echo $district_all['id']; ?>"  ><?php echo $district_all['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        } else {
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
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--City-->
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="city">City</label>
                                                                </div>
                                                                <div class="">
                                                                    <select class="form-control" autocomplete="off" type="text" id="city-bar" autocomplete="off" name="city" required="TRUE">

                                                                        <option value=""> -- Please Select a District First -- </option>
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
                                                            <!--Job_type-->
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="job type">Job Type</label>
                                                                </div>
                                                                <div class="">
                                                                    <select name="job_type" class="form-control">
                                                                        <option>-- Please Select Job Type -- </option>

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
                                                            <div class="">
                                                                <div class="bottom-top">
                                                                    <label for="job type">Privacy</label>
                                                                </div>
                                                                <div class="">
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
                                                                        } else {
                                                                            ?>

                                                                            <option value = "1">Public</option>
                                                                            <option value = "2">Private</option>
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

                                                                <?php
                                                                if (empty($MEMBER->profile_picture)) {
                                                                    ?>
                                                                    <img src="../upload/member/member.png" class="img img-responsive img-thumbnail"/> 
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <img src="../upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img img-responsive img-thumbnail"/> 
                                                                    <?php
                                                                }
                                                                ?> 
                                                                <input type="file" id="profile_picture" class="" name="profile_picture">
                                                                <input type="hidden" name="profile_picture_name" value="<?php echo $MEMBER->profile_picture; ?>"/> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row  ">
                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="id" value="<?php echo $MEMBER->id; ?>" name="id"/>
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

        <script src="js/city.js" type="text/javascript"></script>

        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
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

    </body>

</html>
