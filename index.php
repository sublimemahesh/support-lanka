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
                                                <b>No Industry in the database.</b> 
                                                <?php
                                            }
                                            ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="browse-all-cat">
                                    <a href="all_industry.php" title="">All Industry</a>
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
                                    <h3>Make a Difference Your Life With Us.!</h3>
                                    <h4 class="text-color"><b>Sharing Your Life With Us.</b> </h4>
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
                <div class="block pad-new-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading">
                                    <h2>Vacancy</h2>
                                    <span>Leading Employers already using job and talent.</span>
                                </div>
                                <div class="col-md-10 col-md-offset-1 column pad-bottom">
                                    <div class="emply-list-sec style2">
                                        <?php
                                        $VACANCY = Vacancy::all(0,5);
                                        if (count($VACANCY) > 0) {
                                            foreach ($VACANCY as $key => $vacant) {
                                                if ($key < 3) {
                                                    ?>
                                                    <div class="emply-list">
                                                        <div class="emply-list-thumb">
                                                            <?php
                                                            $COMPANY = new Company($vacant['company']);
                                                            $CITY = new City($COMPANY->city)
                                                            ?>
                                                            <a href="view_vacancy.php?id=<?php echo $vacant['id'] ?>" title=""><img src="upload/company/<?php echo $COMPANY->logo_image ?>" alt="" /></a>
                                                        </div>
                                                        <div class="emply-list-info">
                                                            <div class="emply-pstn">

                                                                <div class="shortlists" id="btn-view"style="float: right;">
                                                                    <a href="view_vacancy.php?id=<?php echo $vacant['id'] ?>" title="">View Details <i class="la la-plus"></i></a>
                                                                </div>
                                                            </div>
                                                            <h3> <a href="view_vacancy.php?id=<?php echo $vacant['id'] ?>" title=""><?php echo $vacant['title'] ?></a></h3>
                                                            <span><a href="view_vacancy.php?id=<?php echo $vacant['id'] ?>"><?php echo $vacant['designation']; ?> / <?php echo $vacant['job_type']; ?></a></span>
                                                            <h6><i class="la la-map-marker"></i> <?php echo $COMPANY->address ?>, <?php echo $CITY->name ?></h6>
                                                            <?php echo substr($vacant['description'], 0, 160) . "..." ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        } else {
                                            ?> 
                                            <b>No vacancy in the database.</b> 
                                            <?php
                                        }
                                        ?> 
                                        <div class="col-lg-12">
                                            <div class="browse-all-cat">
                                                <a href="vacancy.php" title="">All Vacancy</a>
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
                <div class="block">
                    <div data-velocity="-.1" style="background: url(images/resource/parallax2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading light">
                                    <h2>Kind Words From Happy Candidates</h2>
                                    <span>What other people thought about the service provided by JobHunt</span>
                                </div><!-- Heading -->
                                <div class="reviews-sec" id="reviews-carousel">
                                    <?php
                                    $FEEDBACK = FeedBack::activeFeedBack();
                                    if (count($FEEDBACK) > 0) {
                                        foreach ($FEEDBACK as $key => $feed) {
                                            if ($key < 8) {
                                                ?>
                                                <div class="col-lg-6">
                                                    <div class="reviews">
                                                        <img src="upload/feedback/<?php echo $feed['image_name'] ?>" alt="" />
                                                        <h3><?php echo $feed['name'] ?></h3>
                                                        <p><?php echo substr($feed['comment'], 0, 200) . "..." ?></p>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    } else {
                                        ?> 
                                        <b>No Comment in here.</b> 
                                        <?php
                                    }
                                    ?> 
                                </div> 
                                <div class="simple-text-block ">
                                    <a href="add-feedback.php" title="">Add Comment</a>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </section>

            <section>
                <div class="block pad-new-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading">
                                    <h2>Companies We've Helped</h2>
                                    <span>Some of the companies we've helped recruit excellent applicants over the years.</span>
                                </div><!-- Heading -->
                                <div class="comp-sec">
                                    <div class="company-img">
                                        <a href="#" title=""><img src="images/resource/cc1.jpg" alt="" /></a>
                                    </div><!-- Client  -->
                                    <div class="company-img">
                                        <a href="#" title=""><img src="images/resource/cc2.jpg" alt="" /></a>
                                    </div><!-- Client  -->
                                    <div class="company-img">
                                        <a href="#" title=""><img src="images/resource/cc3.jpg" alt="" /></a>
                                    </div><!-- Client  -->
                                    <div class="company-img">
                                        <a href="#" title=""><img src="images/resource/cc4.jpg" alt="" /></a>
                                    </div><!-- Client  -->
                                    <div class="company-img">
                                        <a href="#" title=""><img src="images/resource/cc5.jpg" alt="" /></a>
                                    </div><!-- Client  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="block no-padding">
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="simple-text pad-new-top-min">
                                    <h3>Gat a question?</h3>
                                    <span>We're here to help. Check out our FAQs, send us an email or call us at 0913124477</span>
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

