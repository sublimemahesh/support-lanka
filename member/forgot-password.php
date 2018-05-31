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

        <title> Forgot Password - Support Lanka</title>

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
                    <a href="../index.php"> <img class="memeber-hed-logo" src="../images/logo1.png" alt=""/>
                        <img   src="../images/logo.png" alt=""/></a>
                </div>
            </div>
        </div>

        <div class="member-log-body-2">
            <div class="container">
                <div class="col-md-12 row-new-margin">
                    <form class="form-login" action="post-and-get/reset-password.php" method="POST">
                        <!-- Modal1 -->
                        <div class="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <a href="login.php"><button type="button" class="close" >&times;</button></a>
                                    <h4 class="modal-title">Forgot Password ?</h4>
                                </div>
                                <?php
                                if (isset($_GET['message'])) {

                                    $MESSAGE = New Message($_GET['message']);
                                    ?>
                                    <div class="alert alert-<?php echo $MESSAGE->status; ?>" role = "alert">
                                        <?php echo $MESSAGE->description; ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="modal-body">
                                    <p>Enter your username below to reset your password.</p>
                                    <input type="text" name="username" placeholder="Username" autocomplete="off" class="form-control placeholder-no-fix">

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-theme" type="submit">Send Email</button>
                                </div>
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






