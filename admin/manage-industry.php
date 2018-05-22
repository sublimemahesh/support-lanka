<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$INDUSTRY = new Industry(NULL)
?> 
﻿<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Industry || Admin || Support Lanka</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>
        <section class="content">
            <div class="container-fluid"> 
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Industry
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-industry.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <!--                                <div class="table-responsive">-->
                                <div>
                                    <div class="row clearfix">
                                        <?php
                                        foreach ($INDUSTRY->all() as $key => $indu) {
                                            ?>
                                            <div class="col-md-4">
                                                <div id="div_<?php echo $indu['id']; ?>">
                                                    <div><?php echo $indu['sort']; ?></div> 
                                                    <div><?php echo $indu['name']; ?></div> 
                                                    <a href="create-skill.php?id=<?php echo $indu['id'];?>"><img src="../upload/industry/thumb/<?php echo $indu['image_name']; ?>" width="48%"> </a>
                                                    <div class="top-10"> 
                                                        <a href="edit-industry.php?id=<?php echo $indu['id']; ?>" class="op-link btn btn-sm btn-info">
                                                            <i class="glyphicon glyphicon-pencil"></i>
                                                        </a> 
                                                        |  
                                                        <a href="arrange-industry.php" class="op-link btn btn-sm btn-warning">
                                                            <i class="glyphicon glyphicon-random" data-type="cancel"></i>
                                                        </a>
                                                        |  
                                                        <a href="#" class="delete-industry btn btn-sm btn-danger" data-id="<?php echo $indu['id']; ?>">
                                                            <i class="glyphicon glyphicon-trash" data-type="cancel"></i>
                                                        </a>
                                                        |  
                                                        <a href="create-skill.php?id=<?php echo $indu['id'];?>" class="op-link btn btn-sm btn-success">
                                                            <i class="glyphicon glyphicon-open" data-type="cancel"></i>
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
                        </div>
                    </div>
                </div>
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
        <script src="delete/js/industry.js" type="text/javascript"></script>
    </body>

</html> 