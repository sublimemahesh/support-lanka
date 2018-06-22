<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = $_GET["skill"];
$industry = $_GET["industry"];

$skill = $_GET["skill"];
$INDUSTRY = new Industry($skill);

$SKILL = Skill::GetSkillsByIndustry($INDUSTRY->id);

if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}

$setLimit = 1;

$pageLimit = ($page * $setLimit) - $setLimit;
$MEMBER = Member::all1($pageLimit, $setLimit);
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
                                    <h3>
                                        Employee
                                    </h3>

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
                            <aside class="col-lg-3 col-md-3 hidden-sm hidden-xs column" >
                                <div class="widget border" >
                                    <h3 class="sb-title open">Skills</h3>
                                    <div class="specialism_widget">
                                        <div class="specialism_widget">
                                            <div class="simple-checkbox">
                                                <?php
                                                $SKILLS = Skill::GetSkillsByIndustry($industry);
                                                foreach ($SKILLS as $skil) {
                                                    ?>
                                                    <a href="members.php?skill=<?php echo $skil['id'] ?>&industry=<?php echo $industry ?>">
                                                        <div class="link-line" for="">
                                                            <?php echo $skil['name'] ?>
                                                        </div>
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
                                <div class="emply-resume-sec row-padding-new">
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
                                    <?php Member::showPaginationSkill($setLimit, $page, $skill); ?><!-- Pagination -->
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
