﻿<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');


?>
﻿<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage User || Admin || hurryuptaxi.lk</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
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
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Member</th>
                                                    <th>Name</th>
                                                    <th>Date</th> 
                                                    <th>Contact</th> 
                                                    <th>Email</th> 
                                                    <th>Status</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $MESSAGEREQUEST = new MessageRequest(NULL);
                                                foreach ($MESSAGEREQUEST->getOnlyMemberMessage() as $key => $mess) {
                                                    ?>
                                                    <tr id="row_<?php echo $mess['id']; ?>">
                                                        <td><?php echo $mess['id']; ?></td> 
                                                        <td><?php
                                                            $MEMBER = new Member($mess['member']);
                                                            echo $MEMBER->name;
                                                            ?>
                                                        </td>
                                                        <td><?php echo $mess['title']; ?></td>
                                                        <td><?php echo $mess['date']; ?></td>
                                                        <td><?php echo $mess['contact']; ?></td>
                                                        <td><?php echo $mess['email']; ?></td>
                                                        <td>  
                                                            <?php
                                                            if ($MESSAGEREQUEST->read == 1) {
                                                                ?>
                                                                <a href="manage-messages-view-member.php?id=<?php echo $mess['id']; ?>" style="color:black;">  <i class="material-icons" value="1">drafts</i></a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a href="manage-messages-view-member.php?id=<?php echo $mess['id']; ?> "style="color:black;"> <i class="material-icons">markunread</i></a> 
                                                                <?php
                                                            }
                                                            ?>


                                                        </td>
                                                        <td> 
                                                            <a href="#" class="delete-message-request btn btn-sm btn-danger" data-id="<?php echo $mess['id']; ?>">
                                                                <i class="glyphicon glyphicon-trash" data-type="cancel"></i>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>   
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Member</th> 
                                                    <th>Name</th>
                                                    <th>Date</th> 
                                                    <th>Contact</th> 
                                                    <th>email</th> 
                                                    <th>Option</th>
                                                    <th>Read</th>
                                                </tr>
                                            </tfoot>
                                        </table>
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
        <script src="js/admin.js"></script>
        <script src="js/pages/tables/jquery-datatable.js"></script>
        <script src="js/demo.js"></script>

        <script src="delete/js/message-request.js" type="text/javascript"></script>
    </body>

</html>