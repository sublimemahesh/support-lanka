<?php
include_once(dirname(__FILE__) . '/class/include.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Support Lanka</title>
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
        <link href="js/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/slider.css" rel="stylesheet" type="text/css"/>
        <style>
            .p-category > a i {
                font-size: 0px;
            }
        </style>
    </head>


    <body>
        <div class="theme-layout" id="scrollup">
            <?php
            include './header.php';
            include './slider.php';
            ?>

            <!--Industry-->
            <section id="scroll-here">
                <div class="block pad-new-top">
                    <div class="container">                    

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading">
                                    <h2>Advertisement</h2>
                                    <span>Sri Lanka Supporting Evolution By Business</span>
                                </div><!-- Heading -->
                            </div>
                        </div>

                        <div class="row"  >
                            <div class="owl-carousel">
                                <?php
                                $ADVERTISEMENT = new Advertisement(NULL);
                                foreach ($ADVERTISEMENT->all() as $advertisement) {
                                    ?>
                                    <div   style="padding-top: 40px; padding-bottom: 40px;">
                                        <div class="content">
                                            <a href="view-advertisement.php?id=<?php echo $advertisement['id']; ?>">
                                                <div class="content-overlay"></div>
                                                <img class="content-image" src="upload/advertisement/thumb/<?php echo $advertisement['image_name'] ?>">
                                                <div class="content-details fadeIn-left">
                                                    <h3><?php echo $advertisement['title'] ?></h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?> 

                            </div>
                        </div>                           
                    </div>
                </div>
            </section>
            <section id="scroll-here">
                <div class="block pad-new-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading" style="margin-top: -30px;">
                                    <h2>Select Your Category</h2>
                                    <span>Sri Lanka Supporting Evolution By Business</span>
                                </div><!-- Heading -->
                                <div class="cat-sec">
                                    <div class="no-gape">
                                        <div class="no-gape">
                                            <?php
                                            $INDUSTRY = Industry::all();
                                            if (count($INDUSTRY) > 0) {
                                                foreach ($INDUSTRY as $key => $industry) {
                                                    if ($key < 8) {
                                                        ?>                                                                                                                                                                                                                                                                                                                                                                       <!--  <div class="category-popup" data-url="skills.php?industry=<?php echo $industry['id']; ?>" data-com="companies.php?industry=<?php echo $industry['id']; ?>">-->
                                                        <div class="col-lg-3 col-md-12 col-sm-4 col-xs-12">
                                                            <div class="p-category">
                                                                <a href="skills.php?industry=<?php echo $industry['id']; ?>" title="">
                                                                    <i>
                                                                        <img src="upload/industry/thumb/<?php echo $industry['image_name']; ?>" class="img-responsive img-industy">
                                                                    </i>
                                                                    <span><?php echo $industry['name']; ?></span>

                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!--  </div>-->
                                                        <?php
                                                    }
                                                }
                                            } else {
                                                ?> 
                                                <b>No  Category in the database.</b> 
                                                <?php
                                            }
                                            ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="browse-all-cat">
                                    <a href="all_industry.php" title="">All  Category </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--login-->
            <section>
                <div class="block double-gap-top double-gap-bottom">
                    <div data-velocity="-.1" style="background: url(images/resource/background_image.jpg)  ;" class="parallax scrolly-invisible layer color"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <center>
                                    <img src="images/logo11.png" alt=""/>
                                </center>
                                <div class="simple-text-block">
                                    <h3>A Paradise for part time job seekers </h3>
                                    <h4 class="text-color"><b>Looking for part time jobs?</b> </h4>
                                    <h5 class="text-color"><b>Support Lanka.</b> </h5>
                                    <a href="member/register.php" title="" id="bttn">Create an Account</a>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </section>

  
            <!--company-->
            <section>
                <div class="block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="about-us">
                                    <div class="row" style="margin-bottom: 10px;margin-top: 10px;">
                                        <div class="heading">
                                            <h2>About Jobs</h2>
                                            <span>Sri Lanka Supporting Evolution By Business</span>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-7">
                                            <p class="text-justify">This is an ideal opportunity for those who are willing to utilize their skills for an additional income leisurely in their surroundings.You can even upload the portfolios that show case your skills in the particular job or filled to our website. Though you’re not in a position to reveal in public the job you’d like to anagoge in we certainly promise you to protect your privacy in any case. They need to be registered at privet mode    </p>
                                        </div>
                                        <div class="col-lg-5">
                                            <img src="images/resource/about.jpg" alt=""  style="border-radius: 9px;"/>
                                        </div>
 

                                    </div>

 
                                    </div>
  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 
            </section>
            <section>
                <div class=" ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading">
                                <h2>Advertisement</h2>
                                <span>Sri Lanka Supporting Evolution By Business</span>
                            </div><!-- Heading -->
                        </div>
                    </div>

                    <div class="row"  >
                        <div class="owl-carousel">
                            <?php
                            $ADVERTISEMENT = new Advertisement(NULL);
                            foreach ($ADVERTISEMENT->all() as $advertisement) {
                                ?>


                                <div   style="padding-top: 40px; padding-bottom: 40px;">
                                    <div class="content">
                                        <a href="view-advertisement.php?id=<?php echo $advertisement['id']; ?>">
                                            <div class="content-overlay"></div>
                                            <img class="content-image" src="upload/advertisement/thumb/<?php echo $advertisement['image_name'] ?>">
                                            <div class="content-details fadeIn-left">
                                                <h3><?php echo $advertisement['title'] ?></h3>

                                            </div>
                                        </a>
                                    </div>
                                </div>


                                <?php
                            }
                            ?> 

                        </div>
                    </div>
                </div>
            </section>
        </div>


           </section> 
        </div>
  
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
        $(document).ready(function () {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true
            });
        });
    </script>

    <script src="js/OwlCarousel2-2.3.4/docs/assets/owlcarousel/owl.carousel.min.js" type="text/javascript"></script>
</body>
</html>

