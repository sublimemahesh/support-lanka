<?php
include_once(dirname(__FILE__) . '/class/include.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>All Industry</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="CreativeLayers">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css" />
        <link rel="stylesheet" href="css/icons.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link href="css/line-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="css/line-awesome-font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/line-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/line-awesome.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/chosen.css" />
        <link rel="stylesheet" type="text/css" href="css/colors/colors.css" />
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <style>
            .p-category > a i {
                font-size: 0px;
            }
        </style>
    </head>
    <body>

        <div class="theme-layout" id="scrollup">
            <?php
            include_once './header.php';
            ?>
            <div >
            <section class="overlape   ">
                <div class="block no-padding">
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">
                                    <h3 id="txt-bottom">Select Your Industry</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Industry-->
            <section id="scroll-here" class="new-p-bottom">
                <div class="block new-pad-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading">

                                </div><!-- Heading -->
                                <div class="cat-sec">
                                    <div class="row no-gape">
                                        <div class="row no-gape">
                                            <?php
                                            $INDUSTRY = Industry::all();
                                            if (count($INDUSTRY) > 0) {
                                                foreach ($INDUSTRY as $key => $industry) {
                                                    ?>
                                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                                        <div class="p-category">
                                                            <a href="all_employers.php?industry=<?php echo $industry['id']; ?>" title="">
                                                                <i>
                                                                    <img src="upload/industry/thumb/<?php echo $industry['image_name']; ?>" class="img-responsive img-industy">
                                                                </i>
                                                                <span><?php echo $industry['name']; ?></span>
                                                                <p>(22 open positions)</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                ?> 
                                                <b>No Industry in the database.</b> 
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

        </div>


        <div class="account-popup-area category-popup-box">
            <div class="account-popup1">
                <span class="close-popup"><i class="la la-close"></i></span>
                <div class="model-text">Select Your Title</div>
                <div>
                    <a id="job-applicant" href=""> 
                        <input class="model-title" type="submit" value="Job Applicant"/>
                    </a>
                    <a id="job-provider" href="">
                        <input class="model-title" type="submit" value="Job Provider"/>
                    </a>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/modernizr.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/wow.min.js" type="text/javascript"></script>
        <script src="js/slick.min.js" type="text/javascript"></script>
        <script src="js/parallax.js" type="text/javascript"></script>
        <script src="js/select-chosen.js" type="text/javascript"></script>

    </body>
</html>

