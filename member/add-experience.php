<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$selectedSkill = 0;
if (isset($_GET['skill'])) {
    $selectedSkill = $_GET['skill'];
}
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Add New Experience || My Account</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />
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
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Create Experience</div>
                                <div class="panel-body">

                                    <div class="userccount">
                                        <div class="formpanel">
                                            <form class="form-horizontal"  method="post" action="post-and-get/experience.php" enctype="multipart/form-data"> 
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="card">
                                                        <div class="body">
                                                            <div class="row clearfix">
                                                                <div class="panel-body">

                                                                    <div class="form-group">
                                                                        <div class="bottom-top">
                                                                            <label for="working_place">Skill</label>
                                                                        </div>
                                                                        <div class="formrow">
                                                                            <select name="skil-detail" class="form-control">
                                                                                <option value=""> -- Please select your skill -- </option>
                                                                                <?php
                                                                                $SKILLDETAILS = new SkillDetail(Null);
                                                                                foreach ($SKILLDETAILS->GetSkillByMember($_SESSION["id"]) as $skill_d) {
                                                                                    $SKILL = new Skill($skill_d['skill']);
                                                                                    if ($skill_d['id'] == $selectedSkill) {
                                                                                        echo '<option selected value="' . $skill_d['id'] . '">' . $SKILL->name . '</option>';
                                                                                    } else {
                                                                                        echo '<option value="' . $skill_d['id'] . '">' . $SKILL->name . '</option>';
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="bottom-top">
                                                                            <label for="working_place">Working Place</label>
                                                                        </div>
                                                                        <div class="formrow">
                                                                            <input type="text" id="working_place" name="working_place" class="form-control" placeholder="Please Enter Your Working Place">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="bottom-top">
                                                                            <label for="duration">Duration</label>
                                                                        </div>
                                                                        <div class="formrow">
                                                                            <input type="text" id="duration" name="duration" class="form-control" placeholder="Please Enter Duration">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="bottom-top">
                                                                            <label for="description">Description</label>
                                                                        </div>
                                                                        <div class="formrow">
                                                                            <textarea type="text" id="description" name="description" class="form-control" placeholder="Please Enter Description"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group top-bott50 col-md-12">
                                                                        <div class="bottom-top">
                                                                            <input type="hidden" id="oldDis" value=""/>
                                                                            <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                            <button name="add-experience" type="submit" class="btn btn-info center-block">Create</button>
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

        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/date.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker-2.html"></script>
        <script src="assets/plugins/jquery-steps/jquery.steps.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="js/post-transport-image.js" type="text/javascript"></script>
        <script src="assets/js/form-component.js"></script>    
        <a href="post-and-get/ajax/skill.php"></a>

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
