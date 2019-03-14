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
 

 
        <link href="admin/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
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
            .padd-text-input{
                padding: 10px 28px !important;
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
                                                        <b>No Skills Details in the database.</b> 
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
                                        <div class="cst">
                                            <?php if ($MEMBER->profile_picture == NULL) {
                                                ?>
                                                <img src="upload/member/member.png" class="img-thumbnail">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" id="image" class="view-edit-img img img-responsive img-thumbnail" name="image" alt="old image">

                                                <?php
                                            }
                                            ?>

                                        </div>
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
                                        <div class="emply-btns res-new-p">
                                            <a class="followus" href="member/register.php" title=""><i class="la la-paper-plane"></i>Register</a>
                                        </div>

 
                                        <div > 
 
                                        <div class="row" style="margin-right: 0px;"> 
   
                                            <!-- Trigger the modal with a button -->
                                            <button style="margin-top: 10px; font-size: 18px;font-weight: 650;" type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal"><i class=" fa fa-mobile-phone"></i> <span> Call Me .! </span></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal" role="dialog" style="background-color: rgba(0, 0, 0, 0.64);">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
 
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
 

                                                             <h4 class="modal-title" style="font-size: 18px;font-weight: 650;">Mobile Number</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p style="font-size: 18px;font-weight: 650;"> <i class="la la-phone"></i> <?php echo $MEMBER->contact_number ?> </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
 
 
                                        </div> 

                                        <div class="row" style="margin-right: 0px;"> 
                                            <!-- Trigger the modal with a button -->
                                            <button style="margin-top: 10px; font-size: 18px;font-weight: 650;" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal_2"><i class=" fa fa-pencil-square-o"></i> <span> Add Comment </span></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal_2" role="dialog" style="background-color: rgba(0, 0, 0, 0.64);">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h4 class="modal-title w-100 font-weight-bold" style="margin-top: 10px; font-size: 18px;font-weight: 650;">Write Your Comment.!</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form   method="post" id="form-data" >
                                                            <div class="modal-body mx-3">

                                                                <div class="md-form mb-5">
                                                                    <i class="fa fa-user  "></i>
                                                                    <input type="text"  name="name" id="name" class="form-control validate padd-text-input"  >
                                                                    <label data-error="wrong" data-success="right" for="form34">Your name</label>
                                                                </div>

                                                                <div class="md-form mb-5">
                                                                    <i class="fa fa-envelope prefix grey-text"></i>
                                                                    <input type="email" name="email" id="email" class="form-control validate padd-text-input">
                                                                    <label data-error="wrong" data-success="right" for="form29">Your email</label>
                                                                </div>

                                                                <div class="md-form mb-5">
                                                                    <i class="fa fa-mobile prefix grey-text"></i>
                                                                    <input type="text" name="mobile" id="mobile" class="form-control padd-text-input validate">
                                                                    <label data-error="wrong" data-success="right" for="form32">Contact number</label>
                                                                </div>

                                                                <div class="md-form">
                                                                    <i class="fa fa-pencil prefix grey-text"></i>
                                                                    <textarea type="text"  name="comment"  id="comment" class="md-textarea form-control" rows="2"></textarea>
                                                                    <label data-error="wrong" data-success="right" for="form8">Your comment</label>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-5">
                                                                            <label class="labelcon" for="comment">Security Code:</label>
                                                                            <span id="star">*</span> 
                                                                            <input type="text" name="captchacode" id="captchacode" class="padd-text-input form-control input-validater" placeholder="Enter the security code >> ">
                                                                            <div class="col-md-12">
                                                                                <span id="capspan" ></span> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3"> 
                                                                            <?php include("./contact-form/captchacode-widget.php"); ?> 
                                                                        </div>  
                                                                    </div>
                                                                </div> 


                                                            </div>
                                                            <div class="modal-footer  ustify-content-center"  >
                                                                   
                                                                <button type="submit" id="create" class="btn  " >Send <i class="fa fa-paper-plane-o ml-1"></i></button> 
                                                               <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right: 15px;">Close</button>
                                                                <input type="hidden" name="id" value="<?php echo $id ?>"/>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
 
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
                                                        <b>No Skill Details in the database.</b> 
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
                                                                        <?php echo substr($award['description'], 0, 200) . "..."; ?>
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

 
                        </div
                        <div class="row">
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
                                            foreach ($COMMENT->getCommentByMember($id) as $commnt) {
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
        <script src="js/message-member.js" type="text/javascript"></script>
        <script src="admin/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="comment/validation.js" type="text/javascript"></script>

    </body>
</html>

