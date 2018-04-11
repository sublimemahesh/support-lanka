<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = $_GET["industry"];
$INDUSTRY = new Industry($id);
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
                                    <h3>Skills</h3>
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
                                <div class="widget">
                                    <h3 class="sb-title open">Industry</h3>
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
                            <div class="col-lg-9 column">
                                <div class="emply-resume-sec">
                                    <?php
                                    $SKILLS = Skill::GetSkillsByIndustry($id);
                                    foreach ($SKILLS as $skill) {
                                        ?>
                                        <div class="emply-resume-list square">
                                            <div class="emply-resume-thumb">

                                                <img src="upload/industry/thumb/<?php echo $INDUSTRY->image_name; ?>" alt="" />
                                            </div>
                                            <div class="emply-resume-info">
                                                <h3><a href="#" title=""><?php echo $skill['name']; ?></a></h3>
                                                <span><i><?php
                                                        $skill['id'];
                                                        echo $INDUSTRY->name;
                                                        ?>
                                                        / <?php echo $skill['name']; ?></i></span>

                                            </div>
                                            <div class="shortlists" style="float: right;">
                                                <a href="members.php?skill=<?php echo $skill['id'] ?>" title="">View More <i class="la la-plus"></i></a>
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

    </body>
</html>

