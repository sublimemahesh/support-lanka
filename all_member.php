<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = NULL;

if (isset($_GET['skill'])) {
    $id = $_GET['skill'];
}

$MEMBER = Member::all();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Skill Detail Member</title>
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
                                    <h3>Employees</h3>
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
                            <aside class="col-lg-3 column">
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
                                    <h3 class="sb-title open">Last Activity</h3>
                                    <div class="specialism_widget">
                                        <div class="simple-checkbox">
                                            <p><input type="checkbox" name="smplechk" id="22"><label for="22">Last Hour</label></p>
                                            <p><input type="checkbox" name="smplechk" id="23"><label for="23">Last 24 hours</label></p>
                                            <p><input type="checkbox" name="smplechk" id="24"><label for="24">Last 7 days</label></p>
                                            <p><input type="checkbox" name="smplechk" id="25"><label for="25">Last 14 days</label></p>
                                            <p><input type="checkbox" name="smplechk" id="26"><label for="26">Last 30 days</label></p>
                                            <p><input type="checkbox" name="smplechk" id="27"><label for="27">All</label></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h3 class="sb-title closed">Specialism</h3>
                                    <div class="specialism_widget">
                                        <div class="simple-checkbox">
                                            <p><input type="checkbox" name="spealism" id="as"><label for="as">Accountancy (2)</label></p>
                                            <p><input type="checkbox" name="spealism" id="asd"><label for="asd">Banking (2)</label></p>
                                            <p><input type="checkbox" name="spealism" id="errwe"><label for="errwe">Charity & Voluntary (3)</label></p>
                                            <p><input type="checkbox" name="spealism" id="fdg"><label for="fdg">Digital & Creative (4)</label></p>
                                            <p><input type="checkbox" name="spealism" id="sc"><label for="sc">Estate Agency (3)</label></p>
                                            <p><input type="checkbox" name="spealism" id="aw"><label for="aw">Graduate (2)</label></p>
                                            <p><input type="checkbox" name="spealism" id="ui"><label for="ui">IT Contractor (7)</label></p>
                                            <p><input type="checkbox" name="spealism" id="saas"><label for="saas">Charity & Voluntary (3)</label></p>
                                            <p><input type="checkbox" name="spealism" id="rrrt"><label for="rrrt">Digital & Creative (4)</label></p>
                                            <p><input type="checkbox" name="spealism" id="eweew"><label for="eweew">Estate Agency (3)</label></p>
                                            <p><input type="checkbox" name="spealism" id="bnbn"><label for="bnbn">Graduate (2)</label></p>
                                            <p><input type="checkbox" name="spealism" id="ffd"><label for="ffd">IT Contractor (7)</label></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h3 class="sb-title closed">Offerd Salary</h3>
                                    <div class="specialism_widget">
                                        <div class="simple-checkbox">
                                            <p><input type="checkbox" name="smplechk" id="1"><label for="1">10k - 20k</label></p>
                                            <p><input type="checkbox" name="smplechk" id="2"><label for="2">20k - 30k</label></p>
                                            <p><input type="checkbox" name="smplechk" id="3"><label for="3">30k - 40k</label></p>
                                            <p><input type="checkbox" name="smplechk" id="4"><label for="4">40k - 50k</label></p>
                                            <p><input type="checkbox" name="smplechk" id="28"><label for="28">50k - 60k</label></p>
                                            <p><input type="checkbox" name="smplechk" id="29"><label for="29">60k - 70k</label></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h3 class="sb-title closed">Career Level</h3>
                                    <div class="specialism_widget">
                                        <div class="simple-checkbox">
                                            <p><input type="checkbox" name="smplechk" id="5"><label for="5">Intermediate</label></p>
                                            <p><input type="checkbox" name="smplechk" id="6"><label for="6">Normal</label></p>
                                            <p><input type="checkbox" name="smplechk" id="7"><label for="7">Special</label></p>
                                            <p><input type="checkbox" name="smplechk" id="8"><label for="8">Experienced</label></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h3 class="sb-title closed">Experince</h3>
                                    <div class="specialism_widget">
                                        <div class="simple-checkbox">
                                            <p><input type="checkbox" name="smplechk" id="9"><label for="9">1Year to 2Year</label></p>
                                            <p><input type="checkbox" name="smplechk" id="10"><label for="10">2Year to 3Year</label></p>
                                            <p><input type="checkbox" name="smplechk" id="11"><label for="11">3Year to 4Year</label></p>
                                            <p><input type="checkbox" name="smplechk" id="12"><label for="12">4Year to 5Year</label></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h3 class="sb-title closed">Gender</h3>
                                    <div class="specialism_widget">
                                        <div class="simple-checkbox">
                                            <p><input type="checkbox" name="smplechk" id="13"><label for="13">Male</label></p>
                                            <p><input type="checkbox" name="smplechk" id="14"><label for="14">Female</label></p>
                                            <p><input type="checkbox" name="smplechk" id="15"><label for="15">Others</label></p>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                            <div class="col-lg-9 column">
                                <div class="emply-resume-sec">
                                    <?php
                                    foreach ($MEMBER as $member) {
                                        ?>
                                        <div class="emply-resume-list square">
                                            <div class="emply-resume-thumb">
                                                <a href="member.php?member=<?php echo $member['id']; ?>" title="">
                                                    <img src="upload/member/<?php echo $member['profile_picture']; ?>" alt=""/> 
                                                </a>
                                            </div>
                                            <div class="emply-resume-info">
                                                <h3><a href="#" title=""> <?php echo $member['name']; ?></a></h3>
                                                <span>
                                                    <i>
                                                        <?php
                                                        $SKILLDETAILS = SkillDetail::GetSkillByMember($member['id']);

                                                        foreach ($SKILLDETAILS as $skill_d) {

                                                            $SKILL = new Skill($skill_d['skill']);

                                                            $INDUSTRY = new Industry($SKILL->industry);

                                                            echo $INDUSTRY->name;
                                                            ?> 
                                                            / 
                                                            <?php
                                                        }
                                                        ?>
                                                    </i> at Atract Solutions
                                                </span>
                                                <p><i class="la la-map-marker"></i>
                                                    <?php
                                                    $CITY = new City($member['city']);
                                                    echo $CITY->name;
                                                    ?>
                                                    , 
                                                    <?php echo $member['home_address']; ?>
                                                </p>
                                            </div>
                                            <div class="shortlists">
                                                <a href="member.php?member=<?php echo $member['id']; ?>" title="">View Profile <i class="la la-plus"></i></a>
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
