<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$DISTRICT = new District($id)
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Add New City || Admin || Support Lanka</title>
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
        <!-- Bootstrap Spinner Css -->
        <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">
    </head>

    <body class="theme-red">
        <?php
        include 'navigation-and-header.php';
        ?>

        <section class="content">
            <div class="container-fluid">  
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>Create City</h2>
                                <ul class="header-dropdown">
                                    <li class="">
                                        <a href="manage-district.php">
                                            <i class="material-icons">list</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class=""  method="post" action="post-and-get/city.php" enctype="multipart/form-data"> 
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="district">District</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="name" class="form-control" value="<?php echo $DISTRICT->name ?>" autocomplete="off" name="name" disabled="true">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="name" class="form-control" placeholder="Enter city name" autocomplete="off" name="name" >
                                                    <input type="hidden" id="id" value="<?php echo $DISTRICT->id; ?>" name="id"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-4"> 

                                            <input type="submit" name="add-city" class="btn btn-primary m-t-15 waves-effect" value="Add City"/>
                                        </div>
                                    </div>

                                    <hr/>
                                </form>
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th> 
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $CITY = City::GetCitiesByDistrict($id);
                                        if (count($CITY) > 0) {
                                            foreach ($CITY as $key => $city) {
                                                ?>
                                                <tr id="row_<?php echo $city['id']; ?>">
                                                    <td><?php echo $city['sort']; ?></td> 

                                                    <td><?php echo $city['name']; ?></td>

                                                    <td> 
                                                        <a href="edit-city.php?id=<?php echo $city['id']; ?>" class="op-link btn btn-sm btn-success"><i class="glyphicon glyphicon-pencil"></i>
                                                        </a>

                                                        <a href="#" class="delete-city btn btn-sm btn-danger" data-id="<?php echo $city['id']; ?>">
                                                            <i class="glyphicon glyphicon-trash" data-type="cancel"></i>
                                                        </a>

                                                        <a href="arrange-city.php?id=<?php echo $id ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-random"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th> 
                                            <th>Option</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script> 
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
    <script src="js/demo.js"></script>
    <script src="delete/js/city.js" type="text/javascript"></script>

</body>

</html>