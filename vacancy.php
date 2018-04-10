<?php
include_once(dirname(__FILE__) . '/class/include.php');
$VACANCY = Vacancy::all(NULL);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Vacancy</title>
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
                                    <h3>Vacancy</h3>
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

                            </aside>
                            <div class="col-lg-9 column">

                                <div class="emply-list-sec style2">
                                    <?php
                                    foreach ($VACANCY as $vacant) {
                                        ?>
                                        <div class="emply-list">
                                            <div class="emply-list-thumb">
                                                <?php
                                                $COMPANY = new Company($vacant['company']);
                                                $CITY = new City($COMPANY->city)
                                                ?>
                                                <a href="#" title=""><img src="upload/company/<?php echo $COMPANY->logo_image ?>" alt="" /></a>
                                            </div>
                                            <div class="emply-list-info">
                                                <div class="emply-pstn">

                                                    <div class="shortlists">
                                                        <a href="view_vacancy.php?id=<?php echo $vacant['id']?>" title="">View Details <i class="la la-plus"></i></a>
                                                    </div>
                                                </div>
                                                <h3><a href="#" title=""><?php echo $vacant['title'] ?></a></h3>
                                                <span><?php echo $vacant['designation']; ?> / <?php echo $vacant['job_type']; ?></span>
                                                <h6><i class="la la-map-marker"></i> <?php echo $COMPANY->address ?>, <?php echo $CITY->name ?></h6>
                                                <?php echo substr($vacant['description'], 0 , 160) . "..." ?>
                                                
                                            </div>
                                        </div>
                                    <?php }
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

        <div class="account-popup-area signin-popup-box">
            <div class="account-popup">
                <span class="close-popup"><i class="la la-close"></i></span>
                <h3>User Login</h3>
                <span>Click To Login With Demo User</span>
                <div class="select-user">
                    <span>Candidate</span>
                    <span>Employer</span>
                </div>
                <form>
                    <div class="cfield">
                        <input type="text" placeholder="Username" />
                        <i class="la la-user"></i>
                    </div>
                    <div class="cfield">
                        <input type="password" placeholder="********" />
                        <i class="la la-key"></i>
                    </div>
                    <p class="remember-label">
                        <input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
                    </p>
                    <a href="#" title="">Forgot Password?</a>
                    <button type="submit">Login</button>
                </form>
                <div class="extra-login">
                    <span>Or</span>
                    <div class="login-social">
                        <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
                        <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div><!-- LOGIN POPUP -->

        <div class="account-popup-area signup-popup-box">
            <div class="account-popup">
                <span class="close-popup"><i class="la la-close"></i></span>
                <h3>Sign Up</h3>
                <div class="select-user">
                    <span>Candidate</span>
                    <span>Employer</span>
                </div>
                <form>
                    <div class="cfield">
                        <input type="text" placeholder="Username" />
                        <i class="la la-user"></i>
                    </div>
                    <div class="cfield">
                        <input type="password" placeholder="********" />
                        <i class="la la-key"></i>
                    </div>
                    <div class="cfield">
                        <input type="text" placeholder="Email" />
                        <i class="la la-envelope-o"></i>
                    </div>
                    <div class="dropdown-field">
                        <select data-placeholder="Please Select Specialism" class="chosen">
                            <option>Web Development</option>
                            <option>Web Designing</option>
                            <option>Art & Culture</option>
                            <option>Reading & Writing</option>
                        </select>
                    </div>
                    <div class="cfield">
                        <input type="text" placeholder="Phone Number" />
                        <i class="la la-phone"></i>
                    </div>
                    <button type="submit">Signup</button>
                </form>
                <div class="extra-login">
                    <span>Or</span>
                    <div class="login-social">
                        <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
                        <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div><!-- SIGNUP POPUP -->

        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/modernizr.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="js/wow.min.js" type="text/javascript"></script>
        <script src="js/slick.min.js" type="text/javascript"></script>
        <script src="js/parallax.js" type="text/javascript"></script>
        <script src="js/select-chosen.js" type="text/javascript"></script>
        <script src="js/jquery.scrollbar.min.js" type="text/javascript"></script>
        <script src="js/rslider.js" type="text/javascript"></script>

    </body>
</html>

