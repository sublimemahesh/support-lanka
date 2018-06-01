<?php
include_once(dirname(__FILE__) . '/class/include.php');


if (isset($_GET["page"])) {
    $page = (int) $_GET["page"];
} else {
    $page = 1;
}

$setLimit = 3;

$pageLimit = ($page * $setLimit) - $setLimit;
$companyGet = NULL;
if (isset($_GET['company'])) {
    $companyGet = $_GET['company'];
}

if (!empty($companyGet)) {
    $VACANCY = Vacancy::GetVacancyByCompany1($companyGet, $pageLimit, $setLimit);
} else {
    $VACANCY = Vacancy::all1($pageLimit, $setLimit);
}

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
                                    <h3 id="txt-bottom">Vacancy</h3>
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
                            <aside class="col-lg-3 hidden-md hidden-sm hidden-xs column margin_widget">
                                <div class="widget border">
                                    <h3 class="sb-title open">Company</h3>
                                    <div class="specialism_widget">
                                        <div class="simple-checkbox">
                                            <?php
                                            $COMPAN = Company::all();

                                            foreach ($COMPAN as $key => $com) {
                                                
                                                ?>
                                                <a href="vacancy.php?company=<?php echo $com['id']; ?>">

                                                    <div class="link-line" for="<?php echo $key; ?>"><?php echo $com['name']; ?></div>
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <div class="col-lg-9 column">
                                <div class="emply-list-sec style2 row-padding-new">
                                    <?php
                                    foreach ($VACANCY as $vacant) {
                                        ?>
                                        <div class="emply-list">
                                            <div class="emply-list-thumb">
                                                <?php
                                                $COMPANY = new Company($vacant['company']);
                                                $CITY = new City($COMPANY->city)
                                                ?>
                                                 <a href="view_vacancy.php?id=<?php echo $vacant['id'] ?>" title=""><img src="upload/company/<?php echo $COMPANY->logo_image ?>" alt="" /></a>
                                            </div>
                                            <div class="emply-list-info">
                                                <div class="emply-pstn">

                                                    <div class="shortlists" id="btn-view"style="float: right;">
                                                        <a href="view_vacancy.php?id=<?php echo $vacant['id'] ?>" title="">View Details <i class="la la-plus"></i></a>
                                                    </div>
                                                </div>
                                                <h3><a href="view_vacancy.php?id=<?php echo $vacant['id'] ?>" title=""><?php echo $vacant['title'] ?></a></h3>
                                                <span><a href="view_vacancy.php?id=<?php echo $vacant['id'] ?>"><?php echo $vacant['designation']; ?> / <?php echo $vacant['job_type']; ?></a></span>
                                                <h6><i class="la la-map-marker"></i> <?php echo $COMPANY->address ?>, <?php echo $CITY->name ?></h6>
                                                <?php echo substr($vacant['description'], 0, 160) . "..." ?>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                     <?php Vacancy::showPagination($setLimit, $page, $companyGet); ?>
                                    
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

