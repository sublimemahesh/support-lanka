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

        <title>Add New Skill Details || My Account || Support Lanka</title>

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/jquery-steps/jquery.steps.css" rel="stylesheet" type="text/css"/>
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
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Create Skill Details</div>
                                <div class="panel-body">

                                    <div class="userccount">
                                        <div class="formpanel"> 

                                            <form class="form-horizontal"  method="post" action="post-and-get/skill-detail.php" enctype="multipart/form-data"> 
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="card">
                                                        <div class="body">
                                                            <div class="row clearfix">
                                                                <div class="panel-body">
                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="industry">Industry</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <select class="form-control" autocomplete="off" type="text" id="industry" autocomplete="off" name="industry" required="TRUE">
                                                                                <option value=""> -- Please Select -- </option>
                                                                                <?php foreach (Industry::all() as $key => $skil) {
                                                                                    ?>
                                                                                    <option ind_id="<?php echo $skil['id']; ?>" value="<?php echo $skil['id']; ?>"><?php echo $skil['name']; ?></option><?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="skill">Skill</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <select class="form-control" autocomplete="off" type="text" id="skill-bar" autocomplete="off" name="skill" required="TRUE">
                                                                                <option value=""> -- Please Select a Industry First -- </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="">
                                                                        <div class="bottom-top">
                                                                            <label for="percentage">Percentage</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <input type="text" id="percentage" name="percentage" class="form-control" placeholder="Please Enter Your Skill Percentage">
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
                                                                            <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                            <button name="add-skill-details" type="submit" class="btn btn-info center-block">Create</button>
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

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script> 
        <script src="assets/js/common-scripts.js"></script> 
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script> 
        <script src="assets/js/bootstrap-switch.js"></script> 
        <script src="assets/js/jquery.tagsinput.js"></script> 
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
