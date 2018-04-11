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

        <title>Add New Vacancy || Company </title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/jquery-steps/jquery.steps.css" rel="stylesheet" type="text/css"/>
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
        <div class="loading" id="loading">Loading&#8230;</div>
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
                            $vali = new Validator();

                            $vali->show_message();
                            ?>

                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Create Vacancy</div>
                                <div class="panel-body">

                                    <div class="userccount">
                                        <div class="formpanel"> 

                                            <form class="form-horizontal"  method="post" action="post-and-get/vacancy.php" enctype="multipart/form-data"> 
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="card">
                                                        <div class="body">
                                                            <div class="row clearfix">
                                                                <div class="panel-body">
<!--                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="city">City</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <select class="form-control" autocomplete="off" type="text" id="city" autocomplete="off" name="city" required="TRUE">
                                                                                <option value=""> -- Please Select -- </option>
                                                                                <?php foreach (City::all() as $key => $vacan) {
                                                                                    ?>
                                                                                    <option ind_id="<?php echo $vacan['id']; ?>" value="<?php echo $vacan['id']; ?>"><?php echo $vacan['name']; ?></option><?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="industry">Industry</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <select class="form-control" autocomplete="off" type="text" id="industry" autocomplete="off" name="industry" required="TRUE">
                                                                                <option value=""> -- Please Select -- </option>
                                                                                <?php foreach (Industry::all() as $key => $vacan) {
                                                                                    ?>
                                                                                    <option ind_id="<?php echo $vacan['id']; ?>" value="<?php echo $vacan['id']; ?>"><?php echo $vacan['name']; ?></option><?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>-->

                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="title">Title</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <input type="text" id="title" name="title" class="form-control" placeholder="Please Enter Vacancy Title">
                                                                        </div>
                                                                    </div>

                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="designation">Designation</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <input type="text" id="designation" name="designation" class="form-control" placeholder="Please Enter Vacancy Designation">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="salary">Salary</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <input type="text" id="percentage" name="salary" class="form-control" placeholder="Please Enter Salary">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="age">Age</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <input type="text" id="age" name="age" class="form-control" placeholder="Please Enter Maximum Age">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="gender">Gender</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <input type="text" id="gender" name="gender" class="form-control" placeholder="Please Enter Gender">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="deadline">Deadline</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <input type="date" id="deadline" name="deadline" class="form-control" placeholder="Please Enter Date">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="job_type">Job Type</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <input type="text" id="job_type" name="job_type" class="form-control" placeholder="Please Enter (Full Time or Part Time)">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="description">Description</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <textarea type="text" id="description" name="description" class="form-control" placeholder="Please Enter Description"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="top-bott50 col-md-12">
                                                                        <div class="bottom-top">
                                                                            <input type="hidden" id="oldDis" value=""/>
                                                                            <input type="hidden" id="company" name="company" value="<?php echo $_SESSION['id_com']; ?>"/>
                                                                            <button name="add-vacancy" type="submit" class="btn btn-info center-block">Create</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </form> 
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
        <!--custom checkbox & radio--> 
        <script src="assets/plugins/jquery-steps/jquery.steps.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script> 
        <script src="assets/js/form-component.js"></script>     
        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>

        <!-- skill custom -->
        <script src="js/skill.js"></script>




        <script>

            $(function () {
                $('select.styled').customSelect();
            });

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
