<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = $_GET["id"];
$VACANCY = new Vacancy($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Vacancy Details</title>
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
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax">
                    </div>
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">
                                    <h3 class="no-pad">
                                        <?php
                                        $COMPANY = new Company($VACANCY->company);
                                        echo $COMPANY->name;
                                        ?>
                                    </h3>
                                    <h3><?php echo $VACANCY->title; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="block">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 column">
                                <div class="blog-single">
                                    <div class="bs-thumb">
                                        <img src="images/resource/bs1.jpg" alt="" />
                                    </div>
                                    <ul class="post-metas">
                                        <li>
                                            <a href="#" title="">
                                                <img class="im-vacancy img-responsive" src="upload/company/<?php echo $COMPANY->logo_image ?>" alt="" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="">
                                                <i class="la la-calendar-o">

                                                </i><?php echo $VACANCY->deadline; ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="metascomment" href="#" title=""><i class="la la-comments"></i>4 comments</a>
                                        </li>
                                        <li>
                                            <a href="#" title=""><i class="la la-file-text"></i>
                                                <?php
                                                $IND = new Industry($COMPANY->industry);
                                                echo $IND->name;
                                                ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <h2><?php echo $COMPANY->name; ?> / <?php echo $VACANCY->designation; ?> / <?php echo $VACANCY->title; ?></h2>
                                    <div> <?php echo $VACANCY->description; ?></div>
                                    <div class="tags-share">
                                        <div class="tags_widget">
                                            <span>Company</span>
                                            <a href="company.php?company=<?php echo $COMPANY->id ?>" title=""><?php echo $COMPANY->name ?></a>
                                        </div>
                                        <div class="share-bar">
                                            <a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a><a href="#" title="" class="share-google"><i class="la la-google"></i></a><span>Share</span>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-md-offset-2 commentform-sec">
                                        <h3 class="">Send A Message</h3>
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="pf-title">Message</span>
                                                    <div class="pf-field">
                                                        <textarea></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class="pf-title">Full Name</span>
                                                    <div class="pf-field">
                                                        <input type="text" placeholder="ALi TUFAN" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class="pf-title">Email</span>
                                                    <div class="pf-field">
                                                        <input type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class="pf-title">Phone</span>
                                                    <div class="pf-field">
                                                        <input type="text" placeholder="" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit">Post Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
                            <div class="col-lg-12 column">
                                <div class="emply-list-sec">
                                    <div class="row" id="masonry">
                                        <?php
                                        $VACANT = Vacancy::all(NULL);
                                        if (count($VACANT) > 0) {
                                            foreach ($VACANT as $key => $vacant) {
                                                if ($key < 4) {
                                                    $COMPANY = new Company($vacant['company']);
                                                    $CITY = new City($COMPANY->city);
                                                    ?>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                        <div class="emply-list box">
                                                            <div class="emply-list-thumb">
                                                                <a href="view_vacancy.php?id=<?php echo $vacant['id'] ?>" title="">
                                                                    <img class="img-responsive img-vacnt" src="upload/company/<?php echo $COMPANY->logo_image ?>" alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="emply-list-info">
                                                                <div class="emply-pstn"><?php echo $vacant['job_type']; ?></div>
                                                                <h3><a href="#" title=""><?php echo $COMPANY->name ?> / <?php echo $vacant['designation']; ?></a></h3>
                                                                <span><?php echo $vacant['title']; ?></span>
                                                                <h6><i class="la la-map-marker"></i> 
                                                                    <?php
                                                                    echo $CITY->name;
                                                                    ?>, 
                                                                    <?php echo $COMPANY->address ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        } else {
                                            ?> 
                                            <b>No Vacancy in the database.</b> 
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

