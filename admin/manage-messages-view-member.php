<?php
include_once(dirname(__FILE__) . '/../class/include.php');

$id = $_GET["id"];
$MESSAGE = new MessageRequest($id);
?>

<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Message Request || Admin || Support Lanka</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include 'navigation-and-header.php';
        ?>

        <section class="content">
            <div class="container-fluid"> 
                <!-- Manage Costomer -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Message Request
                                </h2>

                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                                <label for="name">Name</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="padding-top:8px;">
                                                <div class="form-group">
                                                    <div >
                                                        <?php echo $MESSAGE->contact; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                                <label for="name">Email</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="padding-top:8px;">
                                                <div class="form-group">
                                                    <div >
                                                        <?php echo $MESSAGE->email; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                                <label for="name">title</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="padding-top:8px;">
                                                <div class="form-group">
                                                    <div >
                                                        <?php echo $MESSAGE->title; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-4 col-xs-5 form-control-label" >
                                                <label for="name" class="text-center">Message</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" style="padding-top:8px;">
                                            <div class="form-group">
                                                <div >
                                                    <?php echo $MESSAGE->message; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.js"></script> 
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
        <script src="plugins/node-waves/waves.js"></script>
        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <script src="js/admin.js"></script>
        <script src="js/pages/ui/dialogs.js"></script>
        <script src="js/demo.js"></script>
        <script src="delete/js/message-request.js" type="text/javascript"></script>
    </body>

</html>