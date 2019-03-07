<?php
include_once(dirname(__FILE__) . '/class/include.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Contact Us</title>
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
        <style>
            .form-group {
                margin-bottom: 3px !important;
            }
        </style>
    </head>
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
                                    <h3 id="txt-bottom">Contact Us</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="block remove-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31741.73380237132!2d80.215888!3d6.033559!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4768397502edf93!2sSublime+Holdings!5e0!3m2!1sen!2slk!4v1522907141760" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                            <div class="col-lg-6 column " >
                                <div class="contact-form">
                                    <h3>Send Your message</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Full Name-->
                                            <div class="row form-group">
                                                <label class="pf-title1">Full Name<span id="star">*</span></label>
                                                <div class="pf-field">
                                                    <input type="text" name="txtFullName" id="txtFullName" class="form-control input-validater">
                                                </div>
                                                <div class="col-md-12">
                                                    <span id="spanFullName" ></span>
                                                </div>

                                            </div>
                                            <!--Email-->
                                            <div class="row form-group">
                                                <label class="pf-title1">Email<span id="star">*</span></label>
                                                <div class="pf-field">
                                                    <input type="email" name="txtEmail" id="txtEmail" class="form-control input-validater">
                                                </div>
                                                <div class="col-md-12">
                                                    <span id="spanEmail" ></span>
                                                </div>

                                            </div>
                                            <!--Contact Number-->
                                            <div class="row form-group">
                                                <label class="pf-title1">Contact Number</label>
                                                <div class="pf-field">
                                                    <input type="text" name="txtPhone" id="txtPhone" class="form-control input-validater">
                                                </div>
                                            </div>
                                            <!--Subject-->
                                            <div class="row form-group">
                                                <label class="pf-title1">Subject<span id="star">*</span></label>
                                                <div class="pf-field">
                                                    <input type="text" name="txtSubject"  id="txtSubject" class="form-control input-validater">
                                                </div>
                                                <div class="col-md-12">
                                                    <span id="spanSubject" ></span>
                                                </div>                                             
                                            </div>
                                            <!--Message-->
                                            <div class="row form-group">
                                                <label class="pf-title1">Message<span id="star">*</span></label>
                                                <div class="pf-field">
                                                    <textarea name="txtMessage"  id="txtMessage" rows="6" class="form-control" placeholder="write message here"></textarea>
                                                    <div class="col-md-12">
                                                        <span id="spanMessage" ></span>
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
                                                        <?php include("./contact-form/captchacode-widget.php"); ?> 
                                                    </div>  
                                                    <div class="col-sm-4">
                                                        <div class="div-check" >
                                                            <img src="contact-form/img/checking.gif" id="checking"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="res-new-r pull-left">
                                                <button type="submit" id="btnSubmit" class="cp-btn-style1">SEND YOUR MESSAGE</button>
                                                <div id="dismessage" align="center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 column marging-top">
                                <div class="contact-textinfo style2">

                                    <ul>
                                        <li><i class="la la-map-marker"></i><span>Sampatha Adurathwila , Poddala, Galle</span></li>
                                        <li><i class="la la-phone"></i><span>Call Us : 091 224 5333</span></li>
                                        <li><i class="la la-fax"></i><span>Mobile : 071 724 5333 | 070 229 6679</span></li>
                                        <li><i class="la la-envelope-o"></i><span>Email : info@supportlanka.lk</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        <script src="contact-form/scripts.js" type="text/javascript"></script>
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

