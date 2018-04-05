<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = $_GET["member"];
$MEMBER = new Member($id);
$SKILLDETAILS = SkillDetail::GetSkillByMember($MEMBER->id);
$PORTFILIO_PHOTO = new PortfolioPhoto(NULL);
$AWARD = Award::GetAwardByMember($MEMBER->id);
date_default_timezone_set('Asia/Colombo');
$td = date('Y-m-d');
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
        <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <style>
            .forsticky.sticky .menu-sec {
                margin-top: -74px !important;
            }
            p {
                margin-bottom: 5px !important;
            }
            .stick-top.forsticky.sticky {
                height: 0px !important;
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
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="skills-btn">
                                                    <?php
                                                    if (count($SKILLDETAILS) > 0) {
                                                        foreach ($SKILLDETAILS as $key => $skill_d) {
                                                            if ($key < 3) {
                                                                ?>

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
                                        <p><i class="la la-map-marker"></i><?php
                                            $CITY = new City($MEMBER->city);
                                            echo $CITY->name;
                                            ?> / 
                                            <?php echo $MEMBER->home_address ?></p></p>
                                    </div>
                                    <div class="col-lg-2 mem-reg">
                                        <div class="emply-btns">
                                            <a class="followus" href="member/register.php" title=""><i class="la la-paper-plane"></i>Register</a>
                                        </div>
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
                                                                <div class="progressbar"> <div class="progress" style="width: <?php echo $skill_d['percentage']; ?>%;"><span><?php echo $skill_d['percentage']; ?>%</span></div> </div>
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
                                                    <?php
                                                    if (count($AWARD) > 0) {
                                                        foreach ($AWARD as $key => $award) {
                                                            if ($key < 3) {
                                                                ?>
                                                                <div class="edu-history style2">
                                                                    <i></i>
                                                                    <div class="edu-hisinfo">
                                                                        <h3><?php echo $award['title']; ?></h3>
                                                                        <i><?php echo $award['duration']; ?>2</i>
                                                                        <?php echo substr($award['description'], 0, 200) . "..." ; ?>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    } else {
                                                        ?> 
                                                        <b>No Award in this Member.</b> 
                                                        <?php
                                                    }
                                                    ?> 
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 column">

                                            <div class="quick-form-job cand-details"> 
                                                <h2>Contact </h2>
                                                <form class="form-horizontal"  method="post" action="post-and-get/message-request.php" enctype="multipart/form-data" id="form-message">
                                                    <input type="text" id="title" name="title" class="form-control" placeholder="Please Enter Your Name" required="true">
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Please Enter Your Mail" required="true">
                                                    <input type="text" id="contact" name="contact" class="form-control" placeholder="Please Enter Your Contact" required="true"> 
                                                    <input type="hidden" id="new-messages" name="new-messages" value="new-messages">
                                                    <input type="hidden" id="company" name="member" value="<?php echo $id ?>">

                                                    <textarea type="text" id="message" name="message" class="form-control" placeholder="Please Enter Message" required="true"></textarea>

                                                    <button name="add-massage-request" type="submit" class="submit">Send Message</button>
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
        <script src="css/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="js/message-member.js" type="text/javascript"></script>


    </body>
</html>

