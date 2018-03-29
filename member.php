﻿<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = $_GET["member"];
$MEMBER = new Member($id);
$SKILLDETAILS = SkillDetail::GetSkillByMember($MEMBER->id);
$PORTFILIO_PHOTO = new PortfolioPhoto(NULL);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Support Lanka || Member</title>
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <style>
            .forsticky.sticky .menu-sec {
                margin-top: -74px !important;
            }
            p {
                margin-bottom: 5px !important;
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
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="skills-btn">
                                                    <?php
                                                    if (count($SKILLDETAILS) > 0) {
                                                        foreach ($SKILLDETAILS as $key => $skill_d) {
                                                            if ($key < 3) {
                                                                ?>
                                                                <a href="#" title="">
                                                                    <?php
                                                                    $SKILL = new Skill($skill_d['skill']);
                                                                    echo $SKILL->name;
                                                                    ?>
                                                                </a>
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
                                            <div class="col-lg-6">
                                                <div class="action-inner">
                                                    <a href="#" title=""><i class="la la-paper-plane"></i>Save Resume</a>
                                                    <a href="#" title=""><i class="la la-envelope-o"></i>Contact David</a>
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

            <section class="overlape">
                <div class="block remove-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cand-single-user">
                                    <div class="share-bar circle">
                                        <a href="#" title="" class="share-google"><i class="la la-google"></i></a><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                                    </div>
                                    <div class="can-detail-s">
                                        <div class="cst"><img src="upload/member/<?php echo $MEMBER->profile_picture ?>" alt="" /></div>
                                        <h3><?php echo $MEMBER->name ?></h3>
                                        <span>
                                            <?PHP
                                            $SKILLDETAIL = SkillDetail::SkilldetailsBySkillDistinct($id);
                                            $MEM = new Member($skill_d['member']);
                                            ?>

                                            <i>
                                                <?php
                                                $SKILL = new Skill($skill_d['skill']);
                                                $INDUSTRY = new Industry($SKILL->industry);
                                                echo $INDUSTRY->name;
                                                ?> 
                                                / 
                                                <?php
                                                echo $SKILL->name;
                                                ?>
                                            </i> 
                                        </span>
                                        <p><?php echo $MEMBER->email ?></p>
                                        <p><?php echo $MEMBER->contact_number ?></p>
                                        <p><i class="la la-map-marker"></i><?php
                                            $CITY = new City($MEMBER->city);
                                            echo $CITY->name;
                                            ?> / 
                                            <?php echo $MEMBER->home_address ?></p></p>
                                    </div>
                                    <div class="download-cv">
                                        <a href="#" title="">Download CV <i class="la la-download"></i></a>
                                    </div>
                                </div>
                                <ul class="cand-extralink">
                                    <li><a href="#about" title="">About</a></li>
                                    <li><a href="#education" title="">Education</a></li>
                                    <li><a href="#experience" title="">Work Experience</a></li>
                                    <li><a href="#portfolio" title="">Portfolio</a></li>
                                    <li><a href="#skills" title="">Professional Skills</a></li>
                                    <li><a href="#awards" title="">Awards</a></li>
                                </ul>
                                <div class="cand-details-sec">
                                    <div class="row">
                                        <div class="col-lg-8 column">
                                            <div class="cand-details" id="about">
                                                <h2>Employer About</h2>
                                                <p><?php echo $MEMBER->about_me ?></p>
                                                <div class="edu-history-sec" id="education">
                                                    <h2>Education</h2>
                                                    <?php
                                                    $EDUCATION = Education::GetEducationsByMember($MEMBER->id);
                                                    foreach ($EDUCATION as $edu) {
                                                        ?>
                                                        <div class="edu-history">
                                                            <i class="la la-graduation-cap"></i>
                                                            <div class="edu-hisinfo">
                                                                <h3>Higher Education - <?php echo $edu['title']; ?></h3>
                                                                <i><?php echo $edu['duration']; ?></i>
                                                                <span><?php echo $edu['institute']; ?><i><?php echo $edu['stream']; ?></i></span>
                                                                <p><?php echo $edu['description']; ?></p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="edu-history-sec" id="experience">
                                                    <h2>Work & Experience</h2>
                                                    <?php
                                                    $EXPERIENCE = new Experience(NULL);
                                                    foreach ($EXPERIENCE->GetExperienceByMember($MEMBER->id) as $key => $exp) {
                                                        ?>
                                                        <div class="edu-history style2">
                                                            <i></i>
                                                            <div class="edu-hisinfo">
                                                                <h3><?php echo $SKILL->name; ?>
                                                                    <span><?php echo $exp['working_place']; ?></span>
                                                                </h3>
                                                                <i><?php echo $exp['duration']; ?></i>
                                                                <p><?php echo $exp['description']; ?></p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?> 
                                                </div>
                                                <div class="mini-portfolio" id="portfolio">
                                                    <h2>Portfolio</h2>
                                                    <div class="mp-row">
                                                        <?php
                                                        $PORTFILIO = new Portfolio(NULL);
                                                        foreach ($PORTFILIO->GetPortfolioByMember($MEMBER->id) as $key => $port) {
                                                            ?>
                                                            <div class="mp-col text-center">
                                                                <div class="mportolio">
                                                                    <?php
                                                                    if (count($PORTFILIO_PHOTO) > 0) {
                                                                        foreach ($PORTFILIO_PHOTO->getPortfolioPhotosById($port['id']) as $key => $portfolio_p) {
                                                                            if ($key == 1) {
                                                                                break;
                                                                            }
                                                                            ?>
                                                                            <img src="upload/portfolio/thumb/<?php echo $portfolio_p['image_name']; ?>" alt="" />
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?> 
                                                                        <b style="padding-left: 15px;">No Transport Image.</b> 
                                                                    <?php }
                                                                    ?>
                                                                    <a title="" id="port_<?php echo $port['id']; ?>" class="view-portfolio" data-description="<?php echo $port['description']; ?>" data-title="<?php echo $port['title']; ?>" >
                                                                        <i class="la la-search"></i>
                                                                        <div class="port-styl"><?php echo $port['title']; ?></div>
                                                                    </a>
                                                                </div>

                                                            </div> 

                                                            <?php
                                                        }
                                                        ?> 
                                                    </div>
                                                </div>
                                                <div class="progress-sec" id="skills">
                                                    <h2>Professional Skills</h2>
                                                    <?php
                                                    if (count($SKILLDETAILS) > 0) {
                                                        foreach ($SKILLDETAILS as $key => $skill_d) {
                                                            ?>
                                                            <div class="progress-sec">
                                                                <span> 
                                                                    <?php
                                                                    $SKILL = new Skill($skill_d['skill']);
                                                                    echo $SKILL->name;
                                                                    ?>
                                                                </span>
                                                                <div class="progressbar"> <div class="progress" style="width: <?php echo $skill_d['percentage'];?>%;"><span><?php echo $skill_d['percentage'];?>%</span></div> </div>
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
                                                <div class="edu-history-sec" id="awards">
                                                    <h2>Awards</h2>
                                                    <div class="edu-history style2">
                                                        <i></i>
                                                        <div class="edu-hisinfo">
                                                            <h3>Perfect Attendance Programs</h3>
                                                            <i>2008 - 2012</i>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                        </div>
                                                    </div>
                                                    <div class="edu-history style2">
                                                        <i></i>
                                                        <div class="edu-hisinfo">
                                                            <h3>Top Performer Recognition</h3>
                                                            <i>2008 - 2012</i>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                        </div>
                                                    </div>
                                                    <div class="edu-history style2">
                                                        <i></i>
                                                        <div class="edu-hisinfo">
                                                            <h3>King LLC</h3>
                                                            <i>2008 - 2012</i>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="companyies-fol-sec">
                                                    <h2>Companies Followed By</h2>
                                                    <div class="cmp-follow">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                                <a href="#" title=""><img src="images/resource/em1.jpg" alt="" /><span>King LLC</span></a>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                                <a href="#" title=""><img src="images/resource/em2.jpg" alt="" /><span>Telimed</span></a>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                                <a href="#" title=""><img src="images/resource/em3.jpg" alt="" /><span>Ucesas</span></a>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                                <a href="#" title=""><img src="images/resource/em4.jpg" alt="" /><span>TeraPlaner</span></a>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                                <a href="#" title=""><img src="images/resource/em5.jpg" alt="" /><span>Cubico</span></a>
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                                <a href="#" title=""><img src="images/resource/em6.jpg" alt="" /><span>Airbnb</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 column">
                                            <div class="job-overview">
                                                <h3>Job Overview</h3>
                                                <ul>
                                                    <li><i class="la la-money"></i><h3>Offerd Salary</h3><span>£15,000 - £20,000</span></li>
                                                    <li><i class="la la-mars-double"></i><h3>Gender</h3><span>Female</span></li>
                                                    <li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>Executive</span></li>
                                                    <li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>Management</span></li>
                                                    <li><i class="la la-shield"></i><h3>Experience</h3><span>2 Years</span></li>
                                                    <li><i class="la la-line-chart "></i><h3>Qualification</h3><span>Bachelor Degree</span></li>
                                                </ul>
                                            </div><!-- Job Overview -->
                                            <div class="quick-form-job">
                                                <h3>Contact</h3>
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
            </section> 
            <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            <h5 class="modal-title" id="modal-title">

                            </h5>
                        </div>
                        <div class="modal-body">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol> 
                                <div class="carousel-inner" id="slider-images">

                                </div> 
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div>
                                <div id="modal-description">

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                        </div>
                    </div>
                </div>
            </div>

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



    </body>
</html>
