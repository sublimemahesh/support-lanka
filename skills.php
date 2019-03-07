<?php
include_once(dirname(__FILE__) . '/class/include.php');

if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}

$setLimit = 15;

$pageLimit = ($page * $setLimit) - $setLimit;

$industryGet = NULL;
if (isset($_GET['industry'])) {
    $industryGet = $_GET['industry'];
}

$INDUSTRY = new Industry($industryGet);

if (!empty($industryGet)) {
    $SKILLS = Skill::GetSkillsByIndustry1($_GET["industry"], $pageLimit, $setLimit);
} else {
    $SKILLS = Skill::all1($pageLimit, $setLimit);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Skills || Support Lanka</title>
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
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

    </head>
    <body>

        <div class="theme-layout" id="scrollup">

            <?php include './header.php'; ?>

            <section class="overlape">
                <div class="block no-padding">
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">
                                    <h3><?php echo $INDUSTRY->name ?></h3>
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
                            <aside class="col-lg-3 col-md-3  hidden-md hidden-xs column" style="padding-bottom: 35px;">
                                <div class="widget border">
                                    <h3 class="sb-title open">Category</h3>
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
                            </aside>
                            <div class="col-lg-9 col-md-12 column hidden-sm hidden-xs">
                                <?php foreach ($SKILLS as $skill) { ?>
                                    <div class="emply-resume-sec row-padding-new">
                                        <a href="members.php?skill=<?php echo $skill['id'] ?>&industry=<?php echo $industryGet; ?>" title="">      
                                            <div class="emply-resume-list square">                                                
                                                <div class="emply-resume-info">
                                                    <h3><?php echo $skill['name']; ?></h3>
                                                    <span>
                                                        <i><?php
                                                            $skill['id'];
                                                            echo $INDUSTRY->name;
                                                            ?>
                                                            / <?php echo $skill['name']; ?>
                                                        </i>
                                                    </span> 
                                                </div>
                                                <div class="row">
                                                    <div class="shortlists f-right div-color div-color-2">
                                                        View More <i class="la la-plus"></i> 
                                                    </div>
                                                </div>

                                            </div>  

                                        </a> 
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                                Skill::showPagination($setLimit, $page, $industryGet);
                                ?>
                            </div>

                            <div class="col-sm-9 hidden-lg hidden-md column">
                                <?php foreach ($SKILLS as $skill) { ?>
                                    <div class="emply-resume-sec row-padding-new" ">
                                        <a href="members.php?skill=<?php echo $skill['id'] ?>&industry=<?php echo $industryGet; ?>" title="">      
                                            <div class="emply-resume-list square">                                                
                                                <div class="row">
                                                    <div class="emply-resume-info" style="padding-left: 18px;">
                                                        <h3><?php echo $skill['name']; ?></h3>
                                                        <span>
                                                            <i><?php
                                                                $skill['id'];
                                                                echo $INDUSTRY->name;
                                                                ?>
                                                                / <?php echo $skill['name']; ?>
                                                            </i>
                                                        </span> 
                                                    </div>  
                                                </div> 

                                                <div class="row" style="margin-top: 10px;">
                                                    <center>
                                                        <div class="shortlists f-right div-color-2">
                                                            View More <i class="la la-plus"></i> 
                                                        </div> 
                                                    </center> 
                                                </div>                                                
                                            </div> 
                                        </a> 
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                                Skill::showPagination($setLimit, $page, $industryGet);
                                ?>
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

