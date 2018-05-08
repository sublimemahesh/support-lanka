<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$MEMBER = new Member($_SESSION['id']);
?>
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
    <!--logo start-->
    <a href="index-profile.php" class="logo " id="new-font"> <b> Dashboard</b></a>
    <!--logo end-->
    <div class="pull-right top-menu nav notify-row new-notify-row">
        <ul class="nav top-menu">
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.php">
                    <i class="fa fa-envelope"></i>
                    <span class="badge bg-theme">5</span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <p class="green">You have 5 new messages</p>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                            <span class="subject">
                                <span class="from">Zac Snider</span>
                                <span class="time">Just now</span>
                            </span>
                            <span class="message">
                                Hi mate, how is everything?
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                            <span class="subject">
                                <span class="from">Divya Manian</span>
                                <span class="time">40 mins.</span>
                            </span>
                            <span class="message">
                                Hi, I need your help with this.
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                            <span class="subject">
                                <span class="from">Dan Rogers</span>
                                <span class="time">2 hrs.</span>
                            </span>
                            <span class="message">
                                Love your new Dashboard.
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">
                            <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                            <span class="subject">
                                <span class="from">Dj Sherman</span>
                                <span class="time">4 hrs.</span>
                            </span>
                            <span class="message">
                                Please, answer asap.
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.html#">See all messages</a>
                    </li>
                </ul>
            </li>

            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.php">
                    <i class="fa fa-gear"></i>
                    <span class="badge bg-theme"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="./">Home</a></li>
                    <li><a href="edit-profile.php">Edit Profile</a></li>
                    <li><a href="change-password.php">Change Password</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="post-and-get/logout.php">

                            <span class="subject">
                                <span class="from"> Sign Out</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <?php
            if (empty($MEMBER->profile_picture)) {
                ?> 
                <p class="centered"><a href="./"><img src="../upload/member/member.png" class="img-circle" width="60"></a></p>
                <?php
            } else {
                ?>
                <p class="centered"><a href="./"><img src="../upload/member/<?php echo $MEMBER->profile_picture; ?>" id="profil_pic1" class="img-circle" width="60"></a></p>
                <?php
            }
            ?>
            <h5 class="centered"><?php echo $MEMBER->name; ?></h5>
            <h6  class="centered"><?php echo $MEMBER->email; ?></h6>

            <li class="sub-menu">
                <a href="./" >
                    <i class="fa fa-user-circle"></i>
                    <span>Your Profile</span>
                </a> 
            </li>

            <li class="sub-menu">
                <a href="manage-education.php">
                    <i class="fa fa-graduation-cap"></i>
                    <span>Education</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="manage-skill-details.php" >
                    <i class="fa fa-shirtsinbulk"></i>
                    <span>Your Skill</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="manage-experience.php" >
                    <i class="fa fa-etsy"></i>
                    <span>Experience</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="manage-portfolio.php" >
                    <i class="fa fa-product-hunt"></i>
                    <span>Portfolio</span>
                </a>
            </li>
            
            <li class="sub-menu">
                <a href="manage-award.php" >
                    <i class="fa fa-trophy"></i>
                    <span>Award</span>
                </a>
            </li>
            
        </ul>
    </div>
</aside>