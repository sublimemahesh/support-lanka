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

        <title>Login - Support Lanka  </title>

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
                <div class="col-md-6">
                    <img class="memeber-hed-logo" src="../images/logo1.png" alt=""/>
                    <img   src="../images/logo.png" alt=""/>
                </div>
            </div>
        </div>

        <div class="member-log-body-2">
            <div class="container">
                <div class="col-md-12 row-marging">
                    <form class="form-login" action="post-and-get/company.php" method="POST">
                        <h2 class="form-login-heading">sign in now</h2>
                        <div class="login-wrap">
                            <?php
                            if (isset($_GET['message'])) {
                                $message = new Message($_GET['message']);
                                ?>
                                <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>

                                <?php
                            }
                            ?>
                            <input type="email" class="form-control" name="email" placeholder="Email" autofocus>
                            <br>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <label class="checkbox">
                                <span class="pull-right">
                                    <a href="forgot-password.php"> Forgot Password?</a>
                                </span>
                            </label>
                            <button class="btn btn-theme btn-block" name="login" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                            <hr>
                            <div class="login-social-link centered">
                                <p>or you can sign in via your social network</p>
                                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                            </div>
                            <div class="registration">
                                Don't have an account yet?<br/>
                                <label class="checkbox">
                                    <a href="register.php"> Create an account</a>
                                </label>
                            </div>
                        </div>
                    </form>	  
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






