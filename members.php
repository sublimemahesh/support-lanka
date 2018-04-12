<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = $_GET["skill"];

$INDUSTRY = new Industry($_GET["skill"]);

$SKILL = Skill::GetSkillsByIndustry($INDUSTRY->id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Skill Detail Member</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="CreativeLayers">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css" />
        <link rel="stylesheet" href="css/icons.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link href="css/line-awesome-font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/line-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/chosen.css" />
        <link rel="stylesheet" type="text/css" href="css/colors/colors.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div class="theme-layout" id="scrollup">

            <?php
            include './header.php';
            ?>

            <section class="overlape">
                <div class="block no-padding">
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">
                                    <h3>Employees</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="block remove-bottom">
                    <div class="container">
                        <div class="row no-gape">
                            <aside class="col-lg-3 col-md-3 column">
                                <div class="widget">
                                    <h3 class="sb-title open">Skills</h3>
                                    <div class="specialism_widget">
                                        <div class="specialism_widget">
                                            <div class="simple-checkbox">
                                                <?php
                                                foreach ($SKILL as $skil) {
                                                    ?>
                                                    <a href="#">
                                                        <div class="link-line" for=""><?php echo $skil['name'] ?></div>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <div class="col-lg-9 column">
                                <div class="emply-resume-sec">
                                    <?php
                                    $SKILLDETAILS = SkillDetail::SkilldetailsBySkillDistinct($id);
                                    foreach ($SKILLDETAILS as $skill_d) {
                                        $MEMBER = new Member($skill_d['member']);
                                        ?>
                                        <div class="emply-resume-list square">
                                            <div class="emply-resume-thumb">
                                                <a href="member.php?member=<?php echo $MEMBER->id; ?>" title="">
                                                    <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" alt=""/> 
                                                </a>
                                            </div>
                                            <div class="emply-resume-info">
                                                <h3><a href="#" title=""> <?php echo $MEMBER->name; ?></a></h3>
                                                <span>
                                                    <i> <?php
                                                        $SKILL = new Skill($skill_d['skill']);
                                                        $INDUSTRY = new Industry($SKILL->industry);
                                                        echo $INDUSTRY->name;
                                                        ?> 
                                                        / 
                                                        <?php
                                                        echo $SKILL->name;
                                                        ?>
                                                    </i></span>
                                                <p><i class="la la-map-marker"></i>
                                                    <?php
                                                    $CITY = new City($MEMBER->city);
                                                    echo $CITY->name;
                                                    ?>
                                                    , 
                                                    <?php echo $MEMBER->home_address; ?>
                                                </p>
                                            </div>
                                            <div class="shortlists" style="float: right;">
                                                <a href="member.php?member=<?php echo $MEMBER->id; ?>" title="">Details <i class="la la-plus"></i></a>
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
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
        <script type="text/javascript" src="js/maps.js"></script>

    </body>
</html>
