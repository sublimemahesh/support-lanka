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

        <title>Skill Detail || My Account || Support Lanka</title>

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

        <style>
            .img-thumbnail {
                max-width: 50% !important;
            }
            .uploadbox {
                height: 206px !important;
            }
            .col-md-3 {
                padding-bottom: 20px;
                height: 230px;
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
                            $vali = new Validator();
                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-shirtsinbulk"></i> MANAGE MY SKILLS</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="row clearfix" style="padding-top: 15px;">
                                            <div class="col-md-3">
                                                <a href="add-new-skill-details.php">
                                                    <div class="uploadbox uploadphotobx" id="uploadphotobx" >
                                                        <i class="fa fa-plus plus-icon" aria-hidden="true"></i>
                                                        <div style="padding:0px 25px; boarder-radius:6px;">
                                                            <button class="btn-primary form-control"> Click Here To Add MY Skill</button>
                                                        </div>
                                                        <div style="padding:5px 25px;">
                                                            <button class="btn-warning form-control"> Click Here To Another Skill</button>
                                                        </div>

                                                        <!--                                                  Click Here To Add MY Skill-->


                                                    </div>
                                                </a>
                                            </div>  
                                            <?php
                                            $SKILLDETAILS = SkillDetail::GetSkillByMember($_SESSION['id']);
                                            foreach ($SKILLDETAILS as $key => $skill_d) {
                                                ?>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-md-3" id="div_<?php echo $skill_d['id']; ?>">
                                                    <div class="box2 text-center">
                                                        <div class="" style="height: 25px;" >
                                                            <b><?php
                                                                $SKILL = new Skill($skill_d['skill']);
                                                                $SUB_SKILL = new SubSkill($skill_d['sub_skill']);
                                                                $INDUSTRY = new Industry($SKILL->industry);
                                                                echo $INDUSTRY->name;
                                                                ?></b>
                                                        </div>
                                                        <div class="info">
                                                            <h5 class="text-justify" style="height: 25px;"><b>Skill</b> :<?php
                                                                echo $SKILL->name;
                                                                ?>
                                                            </h5>
                                                            <h5 class="text-justify" style="height: 25px;"><b>Sub Skill</b> :<?php
                                                                echo $SUB_SKILL->name;
                                                                ?>
                                                            </h5>
                                                            <div style="height: 50px;">
                                                                <h6 class="text-justify"> <?php echo substr($skill_d['description'], 0, 100) . "" ?>...</h6>

                                                            </div>

                                                            <div class=" text-right" style="padding-top: 4px;">
                                                                <a href="add-new-experience.php?skill=<?php echo $skill_d['id']; ?>" title="ADD EXPERIENCE">
                                                                    <button class="btn btn-warning btn-sm all-icon fa fa-plus-circle"></button>
                                                                </a> |
                                                                <a href="edit-skill-detail.php?id=<?php echo $skill_d['id']; ?>" title="MANAGE SKILL">
                                                                    <button class="btn btn-primary btn-sm all-icon fa fa-pencil"></button>
                                                                </a> |
                                                                <a href="#" title="DELETE SKILL"> 
                                                                    <button class="btn btn-danger btn-sm all-icon fa fa-trash-o delete-skill-detail" data-id="<?php echo $skill_d['id']; ?>"></button>
                                                                </a> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?> 
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
        <script src="assets/js/common-scripts.js"></script>
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="delete/js/skill-detail.js" type="text/javascript"></script>
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
