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
                                                        <div class="category-popup" data-url="skills.php?industry=<?php echo $industry['id']; ?>" data-com="companies.php?industry=<?php echo $industry['id']; ?>">
                                                            <div class="col-lg-3 col-md-3 col-sm-6">
                                                                <div class="p-category">
                                                                    <a title="">
                                                                        <i>
                                                                            <img src="upload/industry/thumb/<?php echo $industry['image_name']; ?>" class="img-responsive img-industy">
                                                                        </i>
                                                                        <span><?php echo $industry['name']; ?></span>
                                                                        <p>(22 open positions)</p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            } else {
                                                ?> 
                                                <b>No Tour Package images in the database.</b> 
                                                <?php
                                            }
                                            ?> 

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="browse-all-cat">
                                    <a href="#" title="">Browse All Categories</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="block double-gap-top double-gap-bottom">
                    <div data-velocity="-.1" style="background: url(images/resource/parallax1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div><!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="simple-text-block">
                                    <h3>Make a Difference with Your Online Resume!</h3>
                                    <span>Your resume in minutes with JobHunt resume assistant is ready!</span>
                                    <a href="#" title="">Create an Account</a>
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
                                    <h2>Job Providers</h2>
                                    <span>Leading Employers already using job and talent.</span>
                                </div><!-- Heading -->
                                <div class="job-listings-sec">
                                    <div class="job-listing">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="images/resource/l1.png" alt="" /> </div>
                                            <h3><a href="#" title="">Web Designer / Developer</a></h3>
                                            <span>Massimo Artemisis</span>
                                        </div>
                                        <span class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</span>
                                        <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        <span class="job-is ft">FULL TIME</span>
                                    </div><!-- Job -->
                                    <div class="job-listing">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="images/resource/l2.png" alt="" /> </div>
                                            <h3><a href="#" title="">Marketing Director</a></h3>
                                            <span>Tix Dog</span>
                                        </div>
                                        <span class="job-lctn"><i class="la la-map-marker"></i>Rennes, France</span>
                                        <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        <span class="job-is pt">PART TIME</span>
                                    </div><!-- Job -->
                                    <div class="job-listing">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="images/resource/l3.png" alt="" /> </div>
                                            <h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
                                            <span>StarHealth</span>
                                        </div>
                                        <span class="job-lctn"><i class="la la-map-marker"></i>London, United Kingdom</span>
                                        <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        <span class="job-is ft">FULL TIME</span>
                                    </div><!-- Job -->
                                    <div class="job-listing">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="images/resource/l4.png" alt="" /> </div>
                                            <h3><a href="#" title="">Application Developer For Android</a></h3>
                                            <span>Altes Bank</span>
                                        </div>
                                        <span class="job-lctn"><i class="la la-map-marker"></i>Istanbul, Turkey</span>
                                        <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        <span class="job-is fl">FREELANCE</span>
                                    </div><!-- Job -->
                                    <div class="job-listing">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="images/resource/l5.png" alt="" /> </div>
                                            <h3><a href="#" title="">Regional Sales Manager South east Asia</a></h3>
                                            <span>Vincent</span>
                                        </div>
                                        <span class="job-lctn"><i class="la la-map-marker"></i>Ajax, Ontario</span>
                                        <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        <span class="job-is tp">TEMPORARY</span>
                                    </div><!-- Job -->
                                    <div class="job-listing">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="images/resource/l6.png" alt="" /> </div>
                                            <h3><a href="#" title="">Social Media and Public Relation Executive </a></h3>
                                            <span>MediaLab</span>
                                        </div>
                                        <span class="job-lctn"><i class="la la-map-marker"></i>Ankara / Turkey</span>
                                        <span class="fav-job"><i class="la la-heart-o"></i></span>
                                        <span class="job-is ft">FULL TIME</span>
                                    </div><!-- Job -->
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="browse-all-cat">
                                    <a href="#" title="">Load more listings</a>
                                </div>
                            </div>
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
                <div class="block">
                    <div data-velocity="-.1" style="background: url(images/resource/parallax3.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading">
                                    <h2>Quick Career Tips</h2>
                                    <span>Found by employers communicate directly with hiring managers and recruiters.</span>
                                </div><!-- Heading -->
                                <div class="blog-sec">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="my-blog">
                                                <div class="blog-thumb">
                                                    <a href="#" title=""><img src="images/resource/b1.jpg" alt="" /></a>
                                                    <div class="blog-metas">
                                                        <a href="#" title="">March 29, 2017</a>
                                                        <a href="#" title="">0 Comments</a>
                                                    </div>
                                                </div>
                                                <div class="blog-details">
                                                    <h3><a href="#" title="">Attract More Attention Sales And Profits</a></h3>
                                                    <p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
                                                    <a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="my-blog">
                                                <div class="blog-thumb">
                                                    <a href="#" title=""><img src="images/resource/b2.jpg" alt="" /></a>
                                                    <div class="blog-metas">
                                                        <a href="#" title="">March 29, 2017</a>
                                                        <a href="#" title="">0 Comments</a>
                                                    </div>
                                                </div>
                                                <div class="blog-details">
                                                    <h3><a href="#" title="">11 Tips to Help You Get New Clients</a></h3>
                                                    <p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
                                                    <a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="my-blog">
                                                <div class="blog-thumb">
                                                    <a href="#" title=""><img src="images/resource/b3.jpg" alt="" /></a>
                                                    <div class="blog-metas">
                                                        <a href="#" title="">March 29, 2017</a>
                                                        <a href="#" title="">0 Comments</a>
                                                    </div>
                                                </div>
                                                <div class="blog-details">
                                                    <h3><a href="#" title="">An Overworked Newspaper Editor</a></h3>
                                                    <p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
                                                    <a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
                                                </div>
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
                <div class="block no-padding">
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="simple-text">
                                    <h3>Gat a question?</h3>
                                    <span>We're here to help. Check out our FAQs, send us an email or call us at 1 (800) 555-5555</span>
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
        </div><!-- Category Popup -->

        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/modernizr.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/wow.min.js" type="text/javascript"></script>
        <script src="js/slick.min.js" type="text/javascript"></script>
        <script src="js/parallax.js" type="text/javascript"></script>
        <script src="js/select-chosen.js" type="text/javascript"></script>

    </body>
</html>

