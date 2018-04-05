<?php
include_once(dirname(__FILE__) . '/class/include.php');
$COMPANY = Company::all(NULL);
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
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
                <div class="block no-padding">
                    <div class="container">
                        <div class="row no-gape">
                            <aside class="col-lg-4 column border-right">
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
                                <div class="widget">
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
                                <div class="widget">
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
                            </aside>
                            <div class="col-lg-8 column">
                                <div class="emply-list-sec" style="padding-top: 21px;">
                                    <?php
                                    foreach ($COMPANY as $com) {
                                        ?>
                                        <div class="emply-list">
                                            <div class="emply-list-thumb">
                                                <a href="#" title=""><img src="upload/company/<?php echo $com['logo_image']; ?>" alt="" /></a>
                                            </div>
                                            <div class="emply-list-info">
                                                <div class="emply-pstn">
                                                    <span class="fav-job"><i class="la la-star"></i></span>
                                                    <span class="fav-job"><i class="la la-star"></i></span>
                                                    <span class="fav-job"><i class="la la-star"></i></span>
                                                    <span class="fav-job"><i class="la la-star"></i></span>
                                                    <span class="fav-job"><i class="la la-star"></i></span>
                                                </div>
                                                <h3><a href="#" title=""><?php echo $com['name']; ?></a></h3>
                                                <span>
                                                    <?php
                                                    $INDUSTRY = new Industry($com['industry']);
                                                    echo $INDUSTRY->name;
                                                    ?>
                                                </span>
                                                <h6><i class="la la-map-marker"></i>
                                                    <?php
                                                    $CITY = new City($com['city']);
                                                    echo $CITY->name;
                                                    ?>
                                                </h6>
                                                <p><?php echo substr($com['about'], 0, 200) . "..." ?></p>
                                                <div class="shortlists" style="float: right">
                                                    <a href="company.php?company=<?php echo $com['id']; ?>" title="">View Profile <i class="la la-plus"></i></a>
                                                </div>
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

    </body>
</html>

