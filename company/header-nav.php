<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$COMPANY = new Company($_SESSION['id_com']);
?>
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
    <!--logo start-->
    <a href="index.php" class="logo"><b>Company Dashboard</b></a>
    <!--logo end-->
    <div class="pull-right top-menu nav notify-row">
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
            if (empty($COMPANY->logo_image)) {
                ?> 
                <p class="centered"><a href="./"><img src="../upload/company/logo.png" class="img-circle" width="60"></a></p>
                <?php
            } else {
                ?>
                <p class="centered"><a href="./"><img src="../upload/company/<?php echo $COMPANY->logo_image; ?>" id="logo_image1" class="img-circle" width="60"></a></p>
                <?php
            }
            ?>
            <h5 class="centered"><?php echo $COMPANY->name; ?></h5>
            <h6  class="centered"><?php echo $COMPANY->email; ?></h6>

            <li class="sub-menu">
                <a href="./" >
                    <i class="fa fa-tachometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="profile.php" >
                    <i class="fa fa-user-circle"></i>
                    <span>Your Profile</span>
                </a> 
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-suitcase"></i>
                    <span>Vacancy</span>
                </a>
                <ul class="sub">
                    <li><a  href="add-vacancy.php">Add New Vacancy</a></li>
                    <li><a  href="manage-vacancy.php">Your Vacancy</a></li>
                    <li><a  href="arrange-vacancy.php">Arrange Vacancy</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</aside>