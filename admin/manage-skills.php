<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Skills || Admin || Support Lanka</title>
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
                <!--                Manage Costomer -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Skills
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-skill.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <div>
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Industry</th>
                                                    <th>Skill</th> 
                                                    <th>Option</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Industry</th>
                                                    <th>Skill</th> 
                                                    <th>Option</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                $SKILL = new Skill(NULL);
                                                foreach ($SKILL->all() as $key => $industry) {
                                                    ?>
                                                    <tr id="row_<?php echo $industry['id']; ?>">
                                                        <td><?php echo $industry['sort']; ?></td> 
                                                        <td>
                                                            <?php
                                                            $INDUSTRY = new Industry($industry['industry']);
                                                            echo $INDUSTRY->name;
                                                            ?>
                                                        </td>
                                                        <td><?php echo $industry['name']; ?></td>
                                                        <td> 
                                                            <a href="edit-skill.php?id=<?php echo $industry['id']; ?>" class="op-link"><button class="glyphicon glyphicon-pencil"></button></a>  |  

                                                            <a href="#" class="delete-skill" data-id="<?php echo $industry['id']; ?>">
                                                                <button class="glyphicon glyphicon-trash" data-type="cancel"></button>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>   
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Jquery Core Js -->
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
        <script src="delete/js/skill.js" type="text/javascript"></script>
    </body>

</html>