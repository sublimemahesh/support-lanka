<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
?> 
﻿<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Feed Back || Admin || Support Lanka</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>
        <section class="content">
            <div class="container-fluid"> 
                <!-- Manage Brand -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Comments
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-feedback.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div>
                                    <div class="row clearfix">
                                        <?php
                                        $FEEDBACK = new FeedBack(NULL);
                                        foreach ($FEEDBACK->all() as $key => $feed_back) {
                                            ?>
                                            <div class="col-md-3 col-sm-6 col-xs-12" id="div_<?php echo $feed_back['id']; ?>">
                                                <p class="maxlinetitle"><?php echo $feed_back['sort']; ?></p>
                                                <img class="img-responsive" src="../upload/feedback/<?php echo $feed_back["image_name"]; ?>" alt=""/>
                                                <p class="maxlinetitle ti-top"><b>Name : </b><?php echo $feed_back['name']; ?></p>
                                                <p class="maxlinetitle text-justify"><b>Comment : </b><?php echo substr($feed_back['comment'], 0, 50); ?></p>
                                                <p class="maxlinetitle ti-bot"><b>Active : </b><?php echo $feed_back['is_active']; ?></p>
                                                <div class="d">
                                                    <a href="edit-feedback.php?id=<?php echo $feed_back['id']; ?>" class="op-link btn btn-sm btn-info">
                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                    </a>
                                                    |  
                                                    <a href="arrange-feedback.php" class="op-link btn btn-sm btn-warning">
                                                        <i class="glyphicon glyphicon-random" data-type="cancel"></i>
                                                    </a>
                                                    |  
                                                    <a href="#" class="delete-comment btn btn-sm btn-danger" data-id="<?php echo $feed_back['id']; ?>">
                                                        <i class="waves-effect glyphicon glyphicon-trash" data-type="cancel"></i>
                                                    </a>  
                                                </div>
                                                <hr>
                                            </div>
                                            <?php
                                        }
                                        ?>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Manage brand -->

            </div>
        </section>

        <script src="plugins/jquery/jquery.min.js"></script>

        <script src="plugins/bootstrap/js/bootstrap.js"></script>

        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <script src="plugins/node-waves/waves.js"></script>

        <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <!-- Custom Js -->
        <script src="js/admin.js"></script>
        <script src="js/pages/tables/jquery-datatable.js"></script>

        <!-- Demo Js -->
        <script src="js/demo.js"></script>
        <script src="delete/js/feedback.js" type="text/javascript"></script>
    </body>

</html> 