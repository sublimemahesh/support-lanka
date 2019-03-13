<?php
include_once(dirname(__FILE__) . '/class/include.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Advertisement</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="CreativeLayers">

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
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="contact-form/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/slider.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div class="theme-layout" id="scrollup">
            <?php
            include_once './header.php';
            ?>

            <section class="overlape">
                <div class="block no-padding">
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">
                                    <h3 id="txt-bottom">Advertisements</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <section>                
                <div class="container">
                    <div class="row"  >
                        <?php
                        $ADVERTISEMENT = new Advertisement(NULL);
                        foreach ($ADVERTISEMENT->all() as $advertisement) {
                            ?>


                            <div class="col-md-4" style="padding-top: 40px; padding-bottom: 40px;">
                                <div class="content">
                                    <a href="view-advertisement.php?id=<?php echo $advertisement['id']; ?>">
                                        <div class="content-overlay"></div>
                                        <img class="content-image" src="upload/advertisement/thumb/<?php echo $advertisement['image_name'] ?>">
                                        <div class="content-details fadeIn-left">
                                            <h3><?php echo $advertisement['title'] ?></h3>

                                        </div>
                                    </a>
                                </div>
                            </div>


                            <?php
                        }
                        ?>
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
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
<script src="js/maps2.js" type="text/javascript"></script>
<script src="contact-form/scripts.js" type="text/javascript"></script>
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

