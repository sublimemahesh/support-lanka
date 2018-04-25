
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
                <div class="col-md-6 col-sm-6">
                    <img class="memeber-hed-logo logo-res new-p-top" src="../images/logo1.png" alt=""/>
                    <img  Class="logo-res-2 new-logo-p-2" src="../images/logo.png" alt=""/>
                </div>
                <div class="col-md-6">
                    <form  action="post-and-get/member.php" method="POST">
                        <?php
                        if (isset($_GET['message'])) {
                            $message = new Message($_GET['message']);
                            ?>
                            <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>

                            <?php
                        }
                        ?>
                        <div class="col-md-5">
                            <div class="member-reg-login-container">
                                <div class="new-p-bottom">Email <br/></div>
                                <div>
                                    <input class="member-log-txtbox" placeholder="Email" name="email" type="email"><br>
                                    <div class="new-p-top btn-keep"> <input type="checkbox">keep me logged in</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="member-reg-login-container">
                                <div class="new-p-bottom">Password<br></div>
                                <div>
                                    <input class="member-log-txtbox" placeholder="password" name="password" type="password"><br>
                                    <div Class="new-p-top">    <a href="forgot-password.php" class="color">Forgot password?</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="member-login-btn-container new-p-btn btn-res">
                                <input class="btn btn-sm member-login-btn "  name="login" value="Login"type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="member-log-body">
            <div class="container-fluid">
                <div class="col-md-6 col-sm-12 p-row">
                    <div class="intro1 ">Helps you to publish your Skills <br>
                    </div>
                    <img class="member-img"src="../images/background.jpg" alt=""/>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <div class="margin-l-20">
                        <form id="register" method="post"> 
                            <input name="name" id="name" placeholder="Enter Your Name" class="inputbox" type="text">
                            <input name="email" id="email" placeholder="Email" class="inputbox" type="text">
                            <input name="contact_number" id="contact_number" placeholder="Contact Number" class="inputbox" type="text">
                            <input type="password" name="password" id="password" placeholder="Enter Password"  class="inputbox" >
                            <div class="policy-container">
                                By clicking Create an account, you agree to our Terms and that you have read our Data Policy
                            </div>
                            <div class="buttn-bottom">
                                <div class="pull-left text-danger btn-padding" id="message" ></div>
                                <div class=" padding_style btn-padding btn-new-padding" >
                                    <div class="buttonreg buttn-type " id="btnSubmit">Register Now</div>
                                    <input type="hidden" name="save" value="save"/>
                                </div>
                            </div>
                        </form>
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






