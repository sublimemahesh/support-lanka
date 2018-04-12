<?php
include_once(dirname(__FILE__) . '/class/include.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Feed Back</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="CreativeLayers">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css" />
        <link rel="stylesheet" href="css/icons.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/chosen.css" />
        <link href="css/line-awesome-font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/line-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/colors/colors.css" />
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <style>
            p {
                color: #666666;
                font-size: 14px;
                margin-bottom: 31px;
                line-height: 27px;
            }
        </style>
    </head>
    <body>

        <div class="theme-layout" id="scrollup">

            <?php
            include './header.php';
            ?>

            <section class="overlape">
                <div class="block no-padding">
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax">
                    </div>
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">

                                    <h3>Feed Back</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section>
                <div class="block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="job-grid-sec">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="padding-top: 21px;">
                                            <div class="quick-form-job">

                                                <form class="form-horizontal"  method="post" action="post-and-get/feedback.php" enctype="multipart/form-data"> 
                                                    <h4 class="text-center" style="padding-bottom: 5px;">Comment</h4>
                                                    <input type="text" id="name" class="form-control" placeholder="Enter Your Name" autocomplete="off" name="name" required="true">
                                                    <input type="file" id="image" class="form-control" name="image" required="true">
                                                    <input type="hidden" value="0" name="active" />
                                                    <textarea type="text" id="comment" class="form-control" name="comment" placeholder="Write Your Comment"></textarea>
                                                    <button type="submit" name="create-comment" class="submit">Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <?php
                                        $FEEDBACK = FeedBack::activeFeedBack();
                                        foreach ($FEEDBACK as $feed) {
                                            ?>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                <div class="job-grid border" style="height: 496px;">
                                                    <div class="job-title-sec">
                                                        <div class="c-logo"> <img src="upload/feedback/<?php echo $feed['image_name']; ?>" alt="" /> </div>
                                                        <span><?php echo $feed['name']; ?></span>
                                                        <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                    </div>
                                                    <span class="job-lctn text-justify">
                                                        <?php echo substr($feed['comment'], 0, 340) . "..." ?>
                                                    </span>

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
            </section>


            <?php
            include './footer.php';
            ?>
        </div>

        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/modernizr.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/wow.min.js" type="text/javascript"></script>
        <script src="js/slick.min.js" type="text/javascript"></script>
        <script src="js/parallax.js" type="text/javascript"></script>
        <script src="js/select-chosen.js" type="text/javascript"></script>
        <script src="js/jquery.scrollbar.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/portfolio.js" type="text/javascript"></script>
        <script src="css/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="js/message-vacancy.js" type="text/javascript"></script>
    </body>
</html>

