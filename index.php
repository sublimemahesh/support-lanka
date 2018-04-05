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
                <div class="block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading">
                                    <h2>Select Your Industry</h2>
                                    <span>Sri Lanka Supporting Evolution By Business</span>
                                </div><!-- Heading -->
                                <div class="cat-sec">
                                    <div class="row no-gape">
                                        <div class="row no-gape">
                                            <?php
                                            $INDUSTRY = Industry::all();
                                            if (count($INDUSTRY) > 0) {
                                                foreach ($INDUSTRY as $key => $industry) {
                                                    if ($key < 8) {
                                                        ?>
                                                                                                                                                                                                                                                                                                <!--                                                        <div class="category-popup" data-url="skills.php?industry=<?php echo $industry['id']; ?>" data-com="companies.php?industry=<?php echo $industry['id']; ?>">-->
                                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                                            <div class="p-category">
                                                                <a href="skills.php?industry=<?php echo $industry['id']; ?>" title="">
                                                                    <i>
                                                                        <img src="upload/industry/thumb/<?php echo $industry['image_name']; ?>" class="img-responsive img-industy">
                                                                    </i>
                                                                    <span><?php echo $industry['name']; ?></span>
                                                                    <p>(22 open positions)</p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!--                                                        </div>-->
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
                    <div data-velocity="-.1" style="background: url(images/resource/parallax1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div><!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="simple-text-block">
                                    <h3>Make a Difference with Your Online Resume!</h3>
                                    <span>Your resume in minutes with JobHunt resume assistant is ready!</span>
                                    <a href="member/register.php" title="">Create an Account</a>
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
                                <div class="heading">
                                    <h2>Vacancy</h2>
                                    <span>Leading Employers already using job and talent.</span>
                                </div><!-- Heading -->
                                <div class="col-md-10 col-md-offset-1 column">

                                    <div class="emply-list-sec style2">
                                        <?php
                                        $VACANCY = Vacancy::all(NULL);
                                        foreach ($VACANCY as $vacant) {
                                            ?>
                                            <div class="emply-list">
                                                <div class="emply-list-thumb">
                                                    <?php
                                                    $COMPANY = new Company($vacant['company']);
                                                    $CITY = new City($COMPANY->city)
                                                    ?>
                                                    <a href="#" title=""><img src="upload/company/<?php echo $COMPANY->logo_image ?>" alt="" /></a>
                                                </div>
                                                <div class="emply-list-info">
                                                    <div class="emply-pstn"><?php echo $vacant['job_type']; ?></div>
                                                    <h3><a href="#" title=""><?php echo $vacant['title'] ?></a></h3>
                                                    <span><?php echo $vacant['designation']; ?></span>
                                                    <h6><i class="la la-map-marker"></i> <?php echo $COMPANY->address ?>, <?php echo $CITY->name ?></h6>
                                                    <?php echo $vacant['description'] ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                        <div class="pagination">
                                            <ul>
                                                <li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Prev</a></li>
                                                <li><a href="">1</a></li>
                                                <li class="active"><a href="">2</a></li>
                                                <li><a href="">3</a></li>
                                                <li><span class="delimeter">...</span></li>
                                                <li><a href="">14</a></li>
                                                <li class="next"><a href="">Next <i class="la la-long-arrow-right"></i></a></li>
                                            </ul>
                                        </div><!-- Pagination -->
                                    </div>
                                </div>
                            </div>
                            <!--  <div class="col-lg-12">
                                                            <div class="browse-all-cat">
                                                                <a href="#" title="">Load more listings</a>
                                                            </div>
                                                        </div>-->
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="block">
                    <div data-velocity="-.1" style="background: url(images/resource/parallax2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div><!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading light">
                                    <h2>Kind Words From Happy Candidates</h2>
                                    <span>What other people thought about the service provided by JobHunt</span>
                                </div><!-- Heading -->
                                <div class="reviews-sec" id="reviews-carousel">
                                    <div class="col-lg-6">
                                        <div class="reviews">
                                            <img src="images/resource/r1.jpg" alt="" />
                                            <h3>Augusta Silva <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                                        </div><!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="reviews">
                                            <img src="images/resource/r2.jpg" alt="" />
                                            <h3>Ali Tufan <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                                        </div><!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="reviews">
                                            <img src="images/resource/r1.jpg" alt="" />
                                            <h3>Augusta Silva <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                                        </div><!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="reviews">
                                            <img src="images/resource/r2.jpg" alt="" />
                                            <h3>Ali Tufan <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                                        </div><!-- Reviews -->
                                    </div>
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
                                <div class="simple-text">
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

