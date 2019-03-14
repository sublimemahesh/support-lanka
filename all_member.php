<?php
include_once(dirname(__FILE__) . '/class/include.php');
$industry = NULL;



if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}

 
$setLimit = 2;
$pageLimit = ($page * $setLimit) ;
 
 
 
$setLimit = 20;

$pageLimit = ($page * $setLimit) - $setLimit;

  
$MEMBER = new Member(NULL);
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
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
                            <aside class="col-lg-3 col-md-3 hidden-md hidden-xs column">
                                <div class="widget border">
                                    <h3 class="sb-title open">Category</h3>
                                    <div class="specialism_widget">
                                        <div class="specialism_widget">
                                            <div class="simple-checkbox">
                                                <?php
                                                $industry = Industry::all();
                                                foreach ($industry as $key => $ind) {
                                                    $key++;
                                                    ?>
                                                    <a href="skills.php?industry=<?php echo $ind['id']; ?>"> 
                                                        <div class="link-line" for="<?php echo $key; ?>"><?php echo $ind['name']; ?></div>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <div class="col-lg-9 col-md-9 hidden-sm hidden-xs column">
                                <div class="emply-resume-sec row-padding-new">
                                    <?php
                                    foreach ($MEMBER->getActiveMember($pageLimit,$setLimit) as $member) {
                                        ?>
                                        <a href="member.php?member=<?php echo $member['id']; ?>" title="">
                                            <div class="emply-resume-list square col-md-12 col-sm-12">
                                                <div class="emply-resume-thumb">

                                                    <?php
                                                    if ($member['profile_picture']) {
                                                        ?>
                                                        <img src = "upload/member/<?php echo $member['profile_picture']; ?>" alt = ""/>
                                                    <?php } else { ?>
                                                        <img src = "upload/member/member.png" alt = ""/>
                                                    <?php } ?>

                                                </div>
                                                <div class = "emply-resume-info ">
                                                    <h3>  <?php echo $member['name'];
                                                    ?> </h3>
                                                    <span> 
                                                        <i>
                                                            <?php
                                                            $SKILLDETAIL = SkillDetail::GetSkillByMember($member['id']);

                                                            foreach ($SKILLDETAIL as $skill_d) {

                                                                $SKILL = new Skill($skill_d['skill']);

                                                                $INDUSTRY = new Industry($SKILL->industry);

                                                                echo $INDUSTRY->name;
                                                                ?> 
                                                                /  
                                                                <?php
                                                                $SKIL = new Skill($skill_d['skill']);
                                                                echo $SKIL->name . '&nbsp;' . '&nbsp;' . '&nbsp;';
                                                            }
                                                            ?> 
                                                        </i> 
                                                    </span>
                                                    <p><i class="la la-map-marker"></i>
                                                        <?php
                                                        $CITY = new City($member['city']);
                                                        echo $CITY->name;
                                                        ?>
                                                        , 
                                                        <?php echo $member['home_address']; ?>
                                                    </p>
                                                </div>
                                                <div class="shortlists" style="float: right;">

                                                    <?php
                                                    for ($ran = 0; $ran <= 4; $ran++) {

                                                        if ($member['rank'] > $ran) {
                                                            ?>
                                                            <span class="fav-job" style="color:yellow; ">
                                                                <i class="la la-star"></i>
                                                            </span> 
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <span class="fav-job"><i class="la la-star"></i></span>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <div class="div-color-2" style="margin-top: 10px;margin-left: -20px;"  >
                                                        View Profile <i class="la la-plus"></i>
                                                    </div>
                                                </div> 
                                            </div>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    <?php Member::showPagination($setLimit, $page); ?>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="block less-top block-p">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 hidden-lg hidden-md column">
                                <div class="emply-list-sec ">
                                    <div class="row" id="masonry">
                                        <?php
                                       foreach ($MEMBER->getActiveMember($pageLimit,$setLimit) as $member) {
                                            ?>
                                            <div class="col-sm-6 col-xs-12 hidden-lg hidden-md">
                                                <div class="emply-list box">
                                                    <div class="emply-list-thumb">
                                                        <?php
                                                        if ($member['profile_picture']) {
                                                            ?>
                                                            <a href="member.php?member=<?php echo $member['id']; ?>" title="">  <img src = "upload/member/<?php echo $member['profile_picture']; ?>" alt = ""/></a>
                                                        <?php } else { ?>
                                                            <a href="member.php?member=<?php echo $member['id']; ?>" title="">  <img src = "upload/member/member.png" alt = ""/></a>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="member.php?member=<?php echo $member['id']; ?>" title="">
                                                        <div class="emply-list-info">
                                                            <h3>  <?php echo $member['name']; ?> </h3>
                                                            <span><?php
                                                                $SKILLDETAIL = SkillDetail::GetSkillByMember($member['id']);

                                                                foreach ($SKILLDETAIL as $skill_d) {

                                                                    $SKILL = new Skill($skill_d['skill']);

                                                                    $INDUSTRY = new Industry($SKILL->industry);

                                                                    echo $INDUSTRY->name;
                                                                    ?> 
                                                                    /  
                                                                    <?php
                                                                    $SKIL = new Skill($skill_d['skill']);
                                                                    echo $SKIL->name . '&nbsp;' . '&nbsp;' . '&nbsp;';
                                                                }
                                                                ?> </span>
                                                            <h6><i class="la la-map-marker"></i> 
                                                                <?php
                                                                $CITY = new City($member['city']);
                                                                echo $CITY->name;
                                                                ?>
                                                                , 
                                                                <?php echo $member['home_address']; ?>
                                                            </h6>
                                                        </div>
                                                    </a>

                                                    <div class="shortlists shortlists-p center-block" style="padding-top: 15px;">
                                                        <a href="member.php?member=<?php echo $member['id']; ?>" title="">View Profile <i class="la la-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <?php Member::showPagination($setLimit, $page); ?>
                                    </div>
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
        <script type="text/javascript" src="js/maps.js"></script><!-- Nice Select -->
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
