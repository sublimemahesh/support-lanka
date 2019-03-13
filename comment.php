<?php
include_once(dirname(__FILE__) . '/class/include.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Comments</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="CreativeLayers">

        <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css" />
        <link rel="stylesheet" href="css/icons.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/responsive.css" />
        <link href="css/line-awesome-font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/line-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/chosen.css" />
        <link rel="stylesheet" type="text/css" href="css/colors/colors.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="contact-form/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/slider.css" rel="stylesheet" type="text/css"/>
        <link href="admin/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
    </head>
    <style>
        .thumbnail {
            padding:0px;
        }
        .panel {
            position:relative;
        }
        .panel>.panel-heading:after,.panel>.panel-heading:before{
            position:absolute;
            top:11px;left:-16px;
            right:100%;
            width:0;
            height:0;
            display:block;
            content:" ";
            border-color:transparent;
            border-style:solid solid outset;
            pointer-events:none;
        }
        .panel>.panel-heading:after{
            border-width:7px;
            border-right-color:#f7f7f7;
            margin-top:1px;
            margin-left:2px;
        }
        .panel>.panel-heading:before{
            border-right-color:#ddd;
            border-width:8px;
        }
    </style>
    <body>

        <div class="theme-layout" id="scrollup">
            <?php
            include_once './header.php';
            ?>

            <section class="overlape">
                <div class="block no-padding">
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">
                                    <h3 id="txt-bottom">Comments</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section>
                <div class="block">
                    <div class="container">
                        <div class="row" id="contact-input">
                            <div class="col-lg-12 column " >
                                <div class="contact-form">

                                    <div class="row">
                                        <form   method="post" id="form-data" >
                                            <!--Full Name-->
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label class="pf-title1">Full Name<span id="star">*</span></label>
                                                    <div class="pf-field">
                                                        <input type="text" name="name" id="name" class="form-control input-validater">
                                                    </div>                                                
                                                </div>
                                                <!--Email-->

                                                <div class="col-md-6">
                                                    <label class="pf-title1">Email<span id="star">*</span></label>
                                                    <div class="pf-field">
                                                        <input type="email" name="email" id="email" class="form-control input-validater">
                                                    </div>

                                                </div>                                            

                                            </div>
                                            <!--Contact Number-->
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label class="pf-title1">Contact Number</label>
                                                    <div class="pf-field">
                                                        <input type="text" name="mobile" id="mobile" class="form-control input-validater">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Message-->
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label class="pf-title1">Comment<span id="star">*</span></label>
                                                    <div class="pf-field">
                                                        <textarea name="comment"  id="comment" rows="6" class="form-control" placeholder="write message here"></textarea>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <label class="labelcon" for="comment">Security Code:</label>
                                                        <span id="star">*</span> 
                                                        <input type="text" name="captchacode" id="captchacode" class="form-control input-validater" placeholder="Enter the security code >> ">
                                                        <div class="col-md-12">
                                                            <span id="capspan" ></span> 
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3"> 
                                                        <?php include("comment/captchacode-widget.php"); ?> 
                                                    </div>  
                                                </div>
                                            </div> 
                                            <div class="res-new-r pull-left">
                                                <button type="submit"   class="cp-btn-style1" id="create">Add Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section>
                    <div class="row">
                        <div class="container">
                            <div class="row" style="margin-bottom:  50px;">
                                <div class="col-sm-12 text-center">
                                    <h3 style="font-size:24px; font-weight: 650"> All Comments  </h3>
                                </div><!-- /col-sm-12 -->
                            </div><!-- /row -->
                            <div class="row"> 
                                <?php
                                $COMMENT = new Comments(NULL);
                                foreach ($COMMENT->all() as $commnt) {
                                    ?>

                                    <div class="col-sm-12 ">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <strong><?php echo $commnt['name'] ?></strong> <span class="text-muted"><?php echo $commnt['email'] ?></span>
                                            </div>
                                            <div class="panel-body">
                                                 <?php echo $commnt['comment'] ?>
                                            </div><!-- /panel-body -->
                                        </div><!-- /panel panel-default -->
                                    </div><!-- /col-sm-5 -->
                                <?php } ?>
                            </div><!-- /row -->

                        </div><!-- /container -->
                    </div>  
                </section>

            </section>

            <?php
            include_once './footer.php';
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
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
        <script src="js/maps2.js" type="text/javascript"></script>
        <script src="comment/validation.js" type="text/javascript"></script>
        <script src="admin/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

        <div id="google_translate_element"></div>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
            }
        </script>

        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>

        <script type="text/javascript">
            $('.translation-links a').click(function () {
                var lang = $(this).data('lang');
                var $frame = $('.goog-te-menu-frame:first');
                if (!$frame.size()) {
                    alert("Error: Could not find Google translate frame.");
                    return false;
                }
                $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
                return false;
            });
        </script>
    </body>
</html>

