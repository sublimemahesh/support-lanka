<?php
include_once(dirname(__FILE__) . '/../class/include.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Register - Support - Lanka</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>

    </head>
    <body class="bgc-color">
        <div class="header-base">
            <div class="container">
                <div class="col-md-12 col-sm-6">
                    <a href="../index.php"> <img class="memeber-hed-logo logo-res new-p-top" src="../images/logo1.png" alt=""/>
                        <img  Class="logo-res-2 new-logo-p-2" src="../images/logo.png" alt=""/></a>
                </div>
            </div>
        </div>

        <div class="member-log-body">
            <div class="container-fluid">
                <div class="col-md-6 hidden-sm hidden-xs">
                    <div class="intro1 text-center">Helps you to publish your Skills<br>
                    </div >
                    <img class="member-img"src="../images/background.jpg" alt=""/>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <div class="col-md-12 col-sm-12 m-padding" >
                        <ul class="nav nav-tabs M-new">
                            <li class="active nav-tabs-active lo-register  ">
                                <a data-toggle="tab" href="#login" class="color-b">Login</a></li>
                            <li class="nav-tabs-active  lo-register  "><a data-toggle="tab" href="#register1" class="color-b">Register</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="login" class="tab-pane fade in active">
                            <div class="col-md-12 row-marging">
                                <?php
                                if (isset($_GET['message'])) {
                                    $message = new Message($_GET['message']);
                                    ?>
                                    <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>

                                    <?php
                                }
                                ?>
                                <form action="post-and-get/member.php" method="POST">
                                    <input name="email" id="email" placeholder="Email" class="inputbox" type="text">
                                    <input type="password" name="password" id="password" placeholder="Enter Password"  class="inputbox" >
                                    <div>
                                        <input type="hidden" name="status" value="1"/>
                                        <input type="hidden" name="profile_picture" value="member.png"/>
                                        <div class="buttn-bottom"  >
                                            <div class="pull-left text-danger btn-padding" id="message" ></div>
                                            <div Class="new-p-top ">  
                                                <a href="forgot-password.php" class="color">Forgot password?</a>
                                            </div>
                                            <div class=" padding_style btn-padding btn-new-padding" >
                                                <button class="buttonreg" name="login">Register Now</button>
                                                <input type="hidden" name="save" value="save"/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="register1" class="tab-pane fade">
                            <div class="margin-l-20">
                                <form id="register" method="post"> 
                                    <input name="name" id="name" placeholder="Enter Your Name" class="inputbox" type="text">
                                    <input name="email" id="email" placeholder="Email" class="inputbox" type="text">
                                    <input name="contact_number" id="contact_number" placeholder="Contact Number" class="inputbox" type="text">
                                    <input type="password" name="password" id="password" placeholder="Enter Password"  class="inputbox" >
                                    <div >
                                        <select name="public" class="inputbox" id="public">
                                            <option> - Please Select Your Account Type - </option>
                                            <option value="1"> Public </option>
                                            <option value="0"> Private </option>
                                        </select>
                                        <input type="hidden" name="status" value="1"/>
                                        <input type="hidden" name="profile_picture" value="member.png"/>
                                        <div class="buttn-bottom"  >
                                            <div class="pull-left text-danger btn-padding" id="message1" ></div>


                                            <div class=" padding_style btn-padding btn-new-padding" >
                                                <div class="buttonreg buttn-type " id="btnSubmit">Register Now</div>
                                                <input type="hidden" name="save" value="save"/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
        <script src="js/register.js" type="text/javascript"></script>
        <script src="js/add-member.js" type="text/javascript"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    </body>

</html>