<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$VACANCY = new Vacancy($id);
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <title>Edit Vacancy || Company Profile</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
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
                        <div class="row  top-bott20"> 
                            <?php
                            $vali = new Validator();

                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Edit Vacancy</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <form class="form-horizontal" method="post" action="post-and-get/vacancy.php" enctype="multipart/form-data"> 
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="title">Title</label>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" id="working_place" name="title" class="form-control" placeholder="Please Enter Title" value="<?php echo $VACANCY->title; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="designation">Designation</label>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" id="designation" name="designation" class="form-control" placeholder="Please Enter Designation" value="<?php echo $VACANCY->designation; ?>">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="salary">Salary</label>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" id="salary" name="salary" class="form-control" placeholder="Please Enter Salary" value="<?php echo $VACANCY->salary; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="age">Maximum Age</label>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" id="age" name="age" class="form-control" placeholder="Please Enter Maximum Age" value="<?php echo $VACANCY->age; ?>">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="gender">Gender</label>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" id="gender" name="gender" class="form-control" placeholder="Please Enter Gender" value="<?php echo $VACANCY->gender; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="deadline">Deadline</label>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" id="deadline" name="deadline" class="form-control" placeholder="Please Enter Deadline" value="<?php echo $VACANCY->deadline; ?>">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="job_type">Job Type</label>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" id="job_type" name="job_type" class="form-control" placeholder="Please Enter Job Type" value="<?php echo $VACANCY->job_type; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="description">Description</label>
                                                            </div>
                                                            <div class="">
                                                                <textarea type="text" id="description" name="description" class="form-control" placeholder="Please Enter description"><?php echo $VACANCY->description; ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="oldDis" value=""/>

                                                                <input type="hidden" id="company" name="company" value="<?php echo $_SESSION['id_com']; ?>"/>
                                                                <input type="hidden" id="id" value="<?php echo $VACANCY->id; ?>" name="id"/>
                                                                <button name="edit-vacancy" type="submit" class="btn btn-info center-block">Change</button>
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

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

        <script src="assets/js/common-scripts.js"></script>

        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <script src="assets/js/bootstrap-switch.js"></script>

        <script src="assets/js/jquery.tagsinput.js"></script>

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
