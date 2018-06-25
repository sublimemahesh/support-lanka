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

        <title>Award || My Account || Support Lanka</title>

        <!-- Bootstrap core CSS -->
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
                height: 193px;
            }
            .col-md-3{
                height: 235px;
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
                                <div class="panel-heading"><i class="fa fa-trophy"></i> Add MY award</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="col-md-3 row-pad">
                                                    <a href="add-new-award.php">
                                                        <div class="uploadbox uploadphotobx" id="uploadphotobx" style="height: 206px;">
                                                            <i class="fa fa-plus plus-icon" aria-hidden="true"></i>
                                                            <label class="uploadBox">Click here to add my award

                                                            </label>
                                                        </div>
                                                    </a>
                                                </div>  
                                                <?php
                                                $AWARD = new Award(NULL);
                                                foreach ($AWARD->GetAwardByMember($_SESSION['id']) as $key => $awa) {
                                                    ?>
                                                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-3" id="div_<?php echo $awa['id']; ?>">
                                                        <div class="box2 text-center">
                                                            <div class="" style="height: 35px;">
                                                                <b><?php echo substr($awa['title'], 0, 20) . "" ?></b>
                                                            </div>
                                                            <div class="info">
                                                                <h5 class="text-justify"><b>Duration</b> : <?php echo substr($awa['duration'], 0, 20) . "" ?></h5>
                                                                <div style="height: 75px;">
                                                                    <h6 class="text-justify"> <?php echo substr($awa['description'], 0, 180); "" ?>...</h6>
                                               
                                                                </div>
                                                                <div class=" text-right" style="padding-top: 4px;">
                                                                    <a href="edit-award.php?id=<?php echo $awa['id']; ?>">
                                                                        <button class="btn btn-primary btn-sm all-icon fa fa-pencil"></button>
                                                                    </a>
                                                                    |
                                                                    <a>
                                                                        <button class="delete-award all-icon btn btn-danger btn-md fa fa-trash-o" data-id="<?php echo $awa['id']; ?>"></button>
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
        <script src="delete/js/award.js" type="text/javascript"></script>
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
