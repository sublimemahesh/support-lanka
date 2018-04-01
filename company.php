<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = $_GET["company"];
$COMPANY = new Company($id);
$VACANCY = Vacancy::GetVacancyByCompany($COMPANY->id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Company Profile || Support Lanka</title>
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
        <link href="css/line-awesome-font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/line-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/chosen.css" />
        <link rel="stylesheet" type="text/css" href="css/colors/colors.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

    </head>
    <body>
        <div class="theme-layout" id="scrollup">
            <?php
            include './header.php';
            ?>

            <section class="overlape">
                <div class="block no-padding">
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">
                                    <h3>Company Profile</h3>
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
                            <div class="col-lg-12 column">
                                <div class="job-single-sec style3">
                                    <div class="job-head-wide">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <div class="job-single-head3 emplye">
                                                    <div class="job-thumb"> <img src="upload/company/<?php echo $COMPANY->logo_image; ?>" alt="" /></div>
                                                    <div class="job-single-info3">
                                                        <h3><?php echo $COMPANY->name; ?></h3>
                                                        <span><i class="la la-map-marker"></i>
                                                            <?php echo $COMPANY->address; ?>,
                                                            <?php
                                                            $CITY = new City($COMPANY->city);
                                                            echo $CITY->name;
                                                            ?>
                                                        </span>
                                                        <span class="job-is ft">Full time
                                                        </span>
                                                        <ul class="tags-jobs">
                                                            <li><i class="la la-file-text"></i> Applications 1</li>
                                                            <li><i class="la la-calendar-o"></i> Post Date: July 29, 2017</li>
                                                            <li><i class="la la-eye"></i> Views 5683</li>
                                                        </ul>
                                                    </div>
                                                </div><!-- Job Head -->
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="share-bar">
                                                    <a href="#" title="" class="share-google"><i class="la la-google"></i></a><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                                                </div>
                                                <div class="emply-btns">
                                                    <a class="seemap" href="#" title=""><i class="la la-map-marker"></i> See On Map</a>
                                                    <a class="followus" href="#" title=""><i class="la la-paper-plane"></i> Follow us</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-wide-devider">
                                        <div class="row">
                                            <div class="col-lg-8 column">		
                                                <div class="job-details">
                                                    <h3>About Us</h3>
                                                    <p><?php echo $COMPANY->about ?></p>
                                                </div>
                                                <div class="recent-jobs">
                                                    <h3>Jobs from Business Network</h3>
                                                    <div class="job-list-modern">
                                                        <div class="job-listings-sec no-border">
                                                            <?php
                                                            if (count($VACANCY) > 0) {
                                                                foreach ($VACANCY as $key => $vacant) {
                                                                    ?>
                                                                    <div class="job-listing wtabs noimg">
                                                                        <div class="job-title-sec">
                                                                            <h3><a href="#" title=""><?php echo $vacant['title']; ?> / <?php echo $vacant['designation']; ?></a></h3>
                                                                            <span>Closing Date : <?php echo $vacant['deadline']; ?></span>
                                                                            <div class="job-lctn">
                                                                                <i class="la la-map-marker">
                                                                                </i> 
                                                                                <?php echo $COMPANY->address; ?>, 
                                                                                <?php
                                                                                $CITY = new City($COMPANY->city);
                                                                                echo $CITY->name;
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="job-style-bx">
                                                                            <span class="job-is ft"><?php echo $vacant['job_type']; ?></span>
                                                                            <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                                            <i>5 months ago</i>
                                                                        </div>
                                                                    </div>
                                                                    <?php
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
                                            <div class="col-lg-4 column">
                                                <div class="job-overview">
                                                    <h3>Company Information</h3>
                                                    <ul>
                                                        <li><i class="la la-eye"></i><h3>Viewed </h3><span>164</span></li>
                                                        <li><i class="la la-file-text"></i><h3>Posted Jobs</h3><span>4</span></li>
                                                        <li><i class="la la-map"></i><h3>Locations</h3><span>United States, San Diego</span></li>
                                                        <li><i class="la la-bars"></i><h3>Categories</h3><span>Arts, Design, Media</span></li>
                                                        <li><i class="la la-clock-o"></i><h3>Since</h3><span>2002</span></li>
                                                        <li><i class="la la-users"></i><h3>Team Size</h3><span>15</span></li>
                                                        <li><i class="la la-user"></i><h3>Followers</h3><span>15</span></li>
                                                    </ul>
                                                </div><!-- Job Overview -->
                                                <div class="quick-form-job">
                                                    <h3>Contact Business Network</h3>
                                                    <form>
                                                        <input type="text" placeholder="Enter your Name *" />
                                                        <input type="text" placeholder="Email Address*" />
                                                        <input type="text" placeholder="Phone Number" />
                                                        <textarea placeholder="Message should have more than 50 characters"></textarea>
                                                        <button class="submit">Send Email</button>
                                                        <span>You accepts our <a href="#" title="">Terms and Conditions</a></span>
                                                    </form>
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

            <footer>
                <div class="block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 column">
                                <div class="widget">
                                    <div class="about_widget">
                                        <div class="logo">
                                            <a href="index.html" title=""><img src="images/resource/logo.png" alt="" /></a>
                                        </div>
                                        <span>Collin Street West, Victor 8007, Australia.</span>
                                        <span>+1 246-345-0695</span>
                                        <span>info@jobhunt.com</span>
                                        <div class="social">
                                            <a href="#" title=""><i class="fa fa-facebook"></i></a>
                                            <a href="#" title=""><i class="fa fa-twitter"></i></a>
                                            <a href="#" title=""><i class="fa fa-linkedin"></i></a>
                                            <a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                            <a href="#" title=""><i class="fa fa-behance"></i></a>
                                        </div>
                                    </div><!-- About Widget -->
                                </div>
                            </div>
                            <div class="col-lg-4 column">
                                <div class="widget">
                                    <h3 class="footer-title">Frequently Asked Questions</h3>
                                    <div class="link_widgets">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a href="#" title="">Privacy & Seurty </a>
                                                <a href="#" title="">Terms of Serice</a>
                                                <a href="#" title="">Communications </a>
                                                <a href="#" title="">Referral Terms </a>
                                                <a href="#" title="">Lending Licnses </a>
                                                <a href="#" title="">Disclaimers </a>	
                                            </div>
                                            <div class="col-lg-6">
                                                <a href="#" title="">Support </a>
                                                <a href="#" title="">How It Works </a>
                                                <a href="#" title="">For Employers </a>
                                                <a href="#" title="">Underwriting </a>
                                                <a href="#" title="">Contact Us</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 column">
                                <div class="widget">
                                    <h3 class="footer-title">Find Jobs</h3>
                                    <div class="link_widgets">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <a href="#" title="">US Jobs</a>	
                                                <a href="#" title="">Canada Jobs</a>	
                                                <a href="#" title="">UK Jobs</a>	
                                                <a href="#" title="">Emplois en Fnce</a>	
                                                <a href="#" title="">Jobs in Deuts</a>	
                                                <a href="#" title="">Vacatures China</a>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 column">
                                <div class="widget">
                                    <div class="download_widget">
                                        <a href="#" title=""><img src="images/resource/dw1.png" alt="" /></a>
                                        <a href="#" title=""><img src="images/resource/dw2.png" alt="" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-line">
                    <span>© 2018 Jobhunt All rights reserved. Design by Creative Layers</span>
                    <a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
                </div>
            </footer>

        </div>

        <div class="account-popup-area signin-popup-box">
            <div class="account-popup">
                <span class="close-popup"><i class="la la-close"></i></span>
                <h3>User Login</h3>
                <span>Click To Login With Demo User</span>
                <div class="select-user">
                    <span>Candidate</span>
                    <span>Employer</span>
                </div>
                <form>
                    <div class="cfield">
                        <input type="text" placeholder="Username" />
                        <i class="la la-user"></i>
                    </div>
                    <div class="cfield">
                        <input type="password" placeholder="********" />
                        <i class="la la-key"></i>
                    </div>
                    <p class="remember-label">
                        <input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
                    </p>
                    <a href="#" title="">Forgot Password?</a>
                    <button type="submit">Login</button>
                </form>
                <div class="extra-login">
                    <span>Or</span>
                    <div class="login-social">
                        <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
                        <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div><!-- LOGIN POPUP -->

        <div class="account-popup-area signup-popup-box">
            <div class="account-popup">
                <span class="close-popup"><i class="la la-close"></i></span>
                <h3>Sign Up</h3>
                <div class="select-user">
                    <span>Candidate</span>
                    <span>Employer</span>
                </div>
                <form>
                    <div class="cfield">
                        <input type="text" placeholder="Username" />
                        <i class="la la-user"></i>
                    </div>
                    <div class="cfield">
                        <input type="password" placeholder="********" />
                        <i class="la la-key"></i>
                    </div>
                    <div class="cfield">
                        <input type="text" placeholder="Email" />
                        <i class="la la-envelope-o"></i>
                    </div>
                    <div class="dropdown-field">
                        <select data-placeholder="Please Select Specialism" class="chosen">
                            <option>Web Development</option>
                            <option>Web Designing</option>
                            <option>Art & Culture</option>
                            <option>Reading & Writing</option>
                        </select>
                    </div>
                    <div class="cfield">
                        <input type="text" placeholder="Phone Number" />
                        <i class="la la-phone"></i>
                    </div>
                    <button type="submit">Signup</button>
                </form>
                <div class="extra-login">
                    <span>Or</span>
                    <div class="login-social">
                        <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
                        <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
                    </div>
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
        <script src="js/jquery.scrollbar.min.js" type="text/javascript"></script>

    </body>
</html>
