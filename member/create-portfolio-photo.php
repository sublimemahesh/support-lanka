<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
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

        <title>Portfolio Images || My Account || Support Lanka</title>

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
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
                <div class="loading" id="loading">Loading&#8230;</div>
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row  top-bott20"> 
                            <?php
                            $vali = new Validator();

                            $vali->show_message();
                            ?>

                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-save"></i> Create Portfolio Images</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel">  
                                                <div class="row clearfix">
                                                    <form class="form-horizontal" method="post" id="form-new-portfolio-photo" enctype="multipart/form-data"> 
                                                        <div class="col-md-3">
                                                            <div class="formrow">
                                                                <div class="uploadbox uploadphotobx" id="uploadphotobx">
                                                                    <i class="fa fa-plus plus-icon" aria-hidden="true"></i>
                                                                    <label class="uploadBox">Click here to Upload photo
                                                                        <input type="file" name="portfolio-picture" id="portfolio-picture">
                                                                        <input type="hidden" name="upload-portfolio-photo" id="upload-portfolio-photo" value="TRUE">
                                                                        <input type="hidden" name="portfolio" id="portfolio" value="<?php echo $id; ?>">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </form>

                                                    <div id="image-list">
                                                        <div id="sortable">
                                                            <?php
                                                            $PORTFOLIO_PHOTOS = PortfolioPhoto::getPortfolioPhotosById($id);
                                                            if (count($PORTFOLIO_PHOTOS) > 0) {
                                                                foreach ($PORTFOLIO_PHOTOS as $key => $portfolio_photo) {
                                                                    $key++;
                                                                    ?>
                                                                    <div class="col-md-3" style="padding-bottom: 15px" id="div_<?php echo $portfolio_photo['id']; ?>"> 
                                                                        <div class="number-class">
                                                                            (<?php echo $key; ?>)
                                                                        </div>
                                                                        <img src="../upload/portfolio/thumb/<?php echo $portfolio_photo['image_name']; ?>" class="img-responsive ">
                                                                        <p class="maxlinetitle"><?php echo $portfolio_photo['caption']; ?></p>
                                                                        <a class="aa">
                                                                            <button class="delete-icon delete-portfolio-photo btn btn-danger btn-md fa fa-trash-o" style="margin-bottom: 25px;" data-id="<?php echo $portfolio_photo['id']; ?>"></button>
                                                                        </a> 
                                                                    </div>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?> 
                                                                <b style="padding-left: 15px;">No Room Images in the database.</b> 
                                                            <?php } ?> 
                                                        </div>
                                                    </div> 
                                                </div> 
                                            </div>
                                        </div> 
                                        <div class="text-right">
                                            <a href="manage-portfolio.php"><button type="button" class="btn btn-round btn-info">Manage Portfolio</button></a>
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
        <script src="assets/js/jquery-ui.js"></script>    
        <script src="assets/js/tasks.js" type="text/javascript"></script>
        <script src="js/add-portfolio-photo.js" type="text/javascript"></script>
        <script src="delete/js/portfolio-photos.js" type="text/javascript"></script>

        <script>

            $(function () {
                $("#sortable").sortable();
                $("#sortable").disableSelection();
            });

        </script>
    </body>

</html>