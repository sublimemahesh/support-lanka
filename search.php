<?php
include_once(dirname(__FILE__) . '/class/include.php');


if ($_GET['keyword'] !== '') {
    $COMPANY = Search::company($_GET['keyword']);
    $MEMBER = Search::members($_GET['keyword']);
} else {
    $MEMBER = Member::all();
    $COMPANY = Company::all();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Members & Employers</title>
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
        <style>
            .job-listing.wtabs {
                height: 140px;
                padding: 19px 0px 0px 10px;
            }
            .emply-pstn {
                padding: 14px 14px 2px 2px;
            }
        </style>
    </head>
    <body>

        <div class="theme-layout" id="scrollup">
            <?php
            include_once './header.php';
            ?>

            <section class="overlape">
                <div class="block no-padding">
                    <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header">
                                    <h3>Search <?php echo $_GET['keyword'] ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="block">
                    <div class="container">
                        <div class="emply-resume-sec job-search">
                            <form class="searchbar row" method="get" action="search.php">
                                <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
                                    <div class="job-field">
                                        <input type="text" name="keyword" class="form-control" value="<?php echo $_GET['keyword'] ?>">
                                        <i class="la la-keyboard-o"></i>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2">
                                    <input type="hidden" value="" name="name" id="name"/>
                                    <button class="btn"><i class="la la-search" aria-hidden="true"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-sec">
                                    <ul class="nav nav-tabs">
                                        <li><a class="current" data-tab="fjobs">Members</a></li>
                                        <li><a data-tab="rjobs">Employers</a></li>
                                    </ul>
                                    <div id="fjobs" class="tab-content current">
                                        <div class="job-listings-tabs">
                                            <div class="row">
                                                <?php
                                                foreach ($MEMBER as $member) {
                                                    ?>
                                                    <div class="col-lg-6">
                                                        <div class="job-listing wtabs">
                                                            <div class="job-title-sec">
                                                                <div class="c-logo"> 
                                                                    <img src="upload/member/<?php echo $member['profile_picture']; ?>" alt="" /> 
                                                                </div>
                                                                <h3>
                                                                    <a href="#" title=""><?php echo $member['name']; ?></a>
                                                                </h3>
                                                                <?php
                                                                $SKILLDETAILS = SkillDetail::SkilldetailsBySkillDistinct($member['id']);
                                                                ?>
                                                                <span>
                                                                    <i>
                                                                        <?php
                                                                        $SKILLDETAIL = SkillDetail::GetSkillByMember($member['id']);
                                                                        foreach ($SKILLDETAIL as $skill_d) {

                                                                            $SKILL = new Skill($skill_d['skill']);

                                                                            $INDUSTRY = new Industry($SKILL->industry);

                                                                            echo $INDUSTRY->name;
                                                                            ?> 
                                                                            /  
                                                                            <?php
                                                                            $SKIL = new Skill($skill_d['skill']);
                                                                            echo $SKIL->name . '&nbsp;' . '&nbsp;' . '&nbsp;';
                                                                        }
                                                                        ?> 
                                                                    </i>
                                                                </span>
                                                                <div class="job-lctn">
                                                                    <i class="la la-map-marker"></i><?php
                                                                    $CITY = new City($member['city']);
                                                                    echo $CITY->name;
                                                                    ?> 
                                                                    / 
                                                                    <?php echo $member['home_address']; ?>
                                                                </div>
                                                            </div>
                                                            <div class="job-style-bx">
                                                                <a href="member.php?member=<?php echo $member['id']; ?>">
                                                                    <span class="job-is ft fill">View More</span>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="rjobs" class="tab-content">
                                        <div class="job-listings-tabs">
                                            <div class="row">
                                                <?php
                                                foreach ($COMPANY as $company) {
                                                    ?>
                                                    <div class="col-lg-6">
                                                        <div class="job-listing wtabs">
                                                            <div class="job-title-sec">
                                                                <div class="c-logo"> 
                                                                    <img src="upload/company/<?php echo $company['logo_image']; ?>" alt="" /> 
                                                                </div>
                                                                <h3>
                                                                    <a href="#" title="">
                                                                        <?php echo $company['name']; ?>
                                                                    </a>
                                                                </h3>
                                                                <span>
                                                                    <?php
                                                                    $INDUSTRY = new Industry($company['industry']);
                                                                    echo $INDUSTRY->name;
                                                                    ?>
                                                                </span>
                                                                <div class="job-lctn">
                                                                    <i class="la la-map-marker"></i>
                                                                    <?php
                                                                    $CITY = new City($company['city']);
                                                                    echo $CITY->name;
                                                                    ?>
                                                                </div>
                                                                <div class="emply-pstn">
                                                                    <?php
                                                                    for ($ran = 0; $ran <= 4; $ran++) {

                                                                        if ($company['rank'] > $ran) {
                                                                            ?>
                                                                            <span class="fav-job" style="color:yellow; ">
                                                                                <i class="la la-star"></i>
                                                                            </span> 
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <span class="fav-job">
                                                                                <i class="la la-star"></i>
                                                                            </span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <div class="job-style-bx">
                                                                <a href="company.php?company=<?php echo $company['id']; ?>">
                                                                    <span class="job-is ft fill">View Profile</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </section>

    <!--            <section>
                    <div class="block remove-bottom">
                        <div class="container">
                            <div class="row no-gape">

                                <div class="col-lg-9 column">

            <?php
            foreach ($MEMBER as $member) {
                ?>
                                                                                                                                                                <div class="emply-resume-list square">
                                                                                                                                                                    <div class="emply-resume-thumb">
                                                                                                                                                                        <img src="upload/member/<?php echo $member['profile_picture']; ?>" alt="" />
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="emply-resume-info">
                                                                                                                                                                        <h3 name="name"><a href="#"><?php echo $member['name']; ?></a></h3>
                <?php
                $SKILLDETAILS = SkillDetail::SkilldetailsBySkillDistinct($member['id']);
                ?>
                                                                                                                                                                        <span>
                                                                                                                                                                            <i>
                <?php
                $SKILLDETAIL = SkillDetail::GetSkillByMember($member['id']);

                foreach ($SKILLDETAIL as $skill_d) {

                    $SKILL = new Skill($skill_d['skill']);

                    $INDUSTRY = new Industry($SKILL->industry);

                    echo $INDUSTRY->name;
                    ?> 
                                                                                                                                                                                                                                                                                                            /  
                    <?php
                    $SKIL = new Skill($skill_d['skill']);
                    echo $SKIL->name . '&nbsp;' . '&nbsp;' . '&nbsp;';
                }
                ?> 

                                                                                                                                                                            </i>
                                                                                                                                                                        </span>
                                                                                                                                                                        <p>
                                                                                                                                                                            <i class="la la-map-marker"></i>
                <?php
                $CITY = new City($member['city']);
                echo $CITY->name;
                ?> 
                                                                                                                                                                            / 
                <?php echo $member['home_address']; ?>
                                                                                                                                                                        </p>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="shortlists">
                                                                                                                                                                        <a href="member.php?member=<?php echo $member['id']; ?>" title="">Shortlist <i class="la la-plus"></i></a>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                <?php
            }
            ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>-->

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
        <script type="text/javascript" src="js/maps.js"></script><!-- Nice Select -->


    </body>
</html>


