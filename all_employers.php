<?php
include_once(dirname(__FILE__) . '/class/include.php');

if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}

$setLimit = 1;

$pageLimit = ($page * $setLimit) - $setLimit;
$industryGet = NULL;
if (isset($_GET['industry'])) {
    $industryGet = $_GET['industry'];
}

if (!empty($industryGet)) {
    $COMPANY = Company::GetCompanysByIndustry1($_GET["industry"], $pageLimit, $setLimit);
} else {
    $COMPANY = Company::all1($pageLimit, $setLimit);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Employer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="CreativeLayers">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css" />
        <link rel="stylesheet" href="css/icons.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href="css/line-awesome-font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/line-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/chosen.css" />
        <link rel="stylesheet" type="text/css" href="css/colors/colors.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="theme-layout" id="scrollup">

            <?php
            include_once './header.php';
            ?>

            <section class="overlape">
                <div class="block no-padding">
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax">
                    </div><!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">
                                    <h3>Employer</h3>
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
                            <aside class="col-lg-3 col-md-3 column" style="padding-bottom: 35px;">
                                <div class="widget border">
                                    <h3 class="sb-title open">Industry</h3>
                                    <div class="specialism_widget">
                                        <div class="simple-checkbox">
                                            <?php
                                            $industry = Industry::all();
                                            foreach ($industry as $key => $ind) {
                                                $key++;
                                                ?>
                                                <a href="all_employers.php?industry=<?php echo $ind['id']; ?>">

                                                    <div class="link-line" for="<?php echo $key; ?>"><?php echo $ind['name']; ?></div>

                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <div class="col-lg-8 column">
                                <div class="emply-list-sec">
                                    <?php
                                    foreach ($COMPANY as $com) {
                                        ?>
                                        <div class="emply-list">
                                            <div class="emply-list-thumb">
                                                <a href="#" title="">
                                                    <img src="upload/company/<?php echo $com['logo_image']; ?>" alt="" />
                                                </a>
                                            </div>
                                            <div class="emply-list-info">
                                                <div class="emply-pstn">
                                                    <?php
                                                    for ($ran = 0; $ran <= 4; $ran++) {

                                                        if ($com['rank'] > $ran) {
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
                                                </div>
                                                <h3>
                                                    <a href="#" ><?php echo $com['name']; ?></a>
                                                </h3>
                                                <span>
                                                    <?php
                                                    $INDUSTRY = new Industry($com['industry']);
                                                    echo $INDUSTRY->name;
                                                    ?>
                                                </span>
                                                <h6>
                                                    <i class="la la-map-marker"></i>
                                                    <?php
                                                    $CITY = new City($com['city']);
                                                    echo $CITY->name;
                                                    ?>
                                                </h6>
                                                <div class="shortlists text-center" style="float: right; padding-top: 10px;">
                                                    <a href="company.php?company=<?php echo $com['id']; ?>" title="">View Profile <i class="la la-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    Company::showPagination($setLimit, $page, $industryGet);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php
            include_once './footer.php';
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
        <script>
            $(':checkbox').on('change', function () {
                var th = $(this), name = th.prop('name');
                if (th.is(':checked')) {
                    $(':checkbox[name="' + name + '"]').not($(this)).prop('checked', false);
                }
            });
        </script>
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
