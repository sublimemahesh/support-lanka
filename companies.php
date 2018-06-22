<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = $_GET["industry"];
$INDUSTRY = new Industry($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Companies || Support Lanka</title>
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
            include './header.php';
            ?>

            <section class="overlape">
                <div class="block no-padding">
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">
                                    <h3>Companies</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="block less-top">
                    <div class="container">
                        <div class="row">
                            <aside class="col-lg-3 column margin_widget">
                                <div class="widget">
                                    <div class="search_widget_job">
                                        <div class="field_w_search">
                                            <input type="text" placeholder="Search Keywords" />
                                            <i class="la la-search"></i>
                                        </div><!-- Search Widget -->
                                        <div class="field_w_search">
                                            <input type="text" placeholder="All Locations" />
                                            <i class="la la-map-marker"></i>
                                        </div><!-- Search Widget -->
                                    </div>
                                </div>
                                <div class="widget border">
                                    <h3 class="sb-title open">Specialism</h3>
                                    <div class="specialism_widget">
                                        <div class="simple-checkbox">
                                            <p><input type="checkbox" name="spealism" id="as"><label for="as">Accountancy (2)</label></p>
                                            <p><input type="checkbox" name="spealism" id="asd"><label for="asd">Banking (2)</label></p>
                                            <p><input type="checkbox" name="spealism" id="errwe"><label for="errwe">Charity & Voluntary (3)</label></p>
                                            <p><input type="checkbox" name="spealism" id="fdg"><label for="fdg">Digital & Creative (4)</label></p>
                                            <p><input type="checkbox" name="spealism" id="sc"><label for="sc">Estate Agency (3)</label></p>
                                            <p><input type="checkbox" name="spealism" id="aw"><label for="aw">Graduate (2)</label></p>
                                            <p><input type="checkbox" name="spealism" id="ui"><label for="ui">IT Contractor (7)</label></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget border">
                                    <h3 class="sb-title open">Team Size</h3>
                                    <div class="specialism_widget">
                                        <div class="simple-checkbox">
                                            <p><input type="checkbox" name="spealism" id="t1"><label for="t1">1 - 10</label></p>
                                            <p><input type="checkbox" name="spealism" id="t2"><label for="t2">100 - 200</label></p>
                                            <p><input type="checkbox" name="spealism" id="t3"><label for="t3">201 - 301</label></p>
                                            <p><input type="checkbox" name="spealism" id="t4"><label for="t4">301 - 401</label></p>
                                            <p><input type="checkbox" name="spealism" id="t5"><label for="t5">401 - 501</label></p>
                                            <p><input type="checkbox" name="spealism" id="t6"><label for="t6">501 - 601</label></p>
                                            <p><input type="checkbox" name="spealism" id="t7"><label for="t7">601 - 701</label></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget border">
                                    <h3 class="sb-title open">Since</h3>
                                    <div class="range_slider">
                                        <div class="nstSlider" data-range_min="1990" data-range_max="2018"  data-cur_min="1991"    data-cur_max="2007">
                                            <div class="bar"></div>
                                            <div class="leftGrip"></div>
                                            <div class="rightGrip"></div>
                                        </div>
                                        <div class="leftLabel"></div>
                                        <div class="rightLabel"></div>
                                    </div>
                                </div>
                            </aside>
                            <div class="col-lg-9 column">
                                <div class="filterbar">
                                    <p>Total of 145 Employer</p>
                                    <div class="sortby-sec">
                                        <span>Sort by</span>
                                        <select data-placeholder="20 Per Page" class="chosen">
                                            <option>30 Per Page</option>
                                            <option>40 Per Page</option>
                                            <option>50 Per Page</option>
                                            <option>60 Per Page</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="emply-list-sec">
                                    <div class="row" id="masonry">
                                        <?php
                                        $COMPANY = new Company($id);
                                        $COMPAN = Company::GetCompanysByIndustry($id);
                                        foreach ($COMPAN as $com) {
                                            ?>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="emply-list box">
                                                    <div class="emply-list-thumb">
                                                        <a href="company.php?company=<?php echo $com['id']; ?>">

                                                            <img src="upload/industry/thumb/<?php echo $INDUSTRY->image_name; ?>" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="emply-list-info">
                                                        <div class="emply-pstn">4 Jobs</div>
                                                        <h3>
                                                            <a href="#" title=""> 
                                                                <?php
                                                                $com['id'];
                                                                echo $INDUSTRY->name;
                                                                ?>
                                                            </a>
                                                        </h3>
                                                        <span> 
                                                            <h6> Since : <?php echo $com['since']; ?></h6> 
                                                        </span>
                                                        <h6>
                                                            <i class="la la-map-marker"></i> 
                                                            <?php echo $com['address']; ?>,
                                                            <?php
                                                            $CITY = new City($com['city']);
                                                            echo $CITY->name;
                                                            ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
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
        <script src="js/isotop.js" type="text/javascript"></script>
        <script src="js/parallax.js" type="text/javascript"></script>
        <script src="js/select-chosen.js" type="text/javascript"></script>
        <script src="js/jquery.scrollbar.min.js" type="text/javascript"></script>
        <script src="js/rslider.js" type="text/javascript"></script>
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
