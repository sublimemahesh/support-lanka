<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$MEMBER = new Member(NULL);
$SKILL = SkillDetail::GetSkillByMember($MEMBER->id);
?>
<!DOCTYPE html>
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
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
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
                <!-- Manage Districts -->

                <div class="card">
                    <div class="header">
                        <h2>
                            Manage User
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="create-member.php">
                                    <i class="material-icons">add</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>NIC Number</th>
                                        <th>Name</th> 
                                        <th>Contact Number</th> 
                                        <td>Skill</td>
                                        <th class="text-center">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($MEMBER->getActiveMember() as $key => $member) {
                                        ?>
                                        <tr id="row_<?php echo $member['id']; ?>">
                                            <td><?php echo $member['nic_number']; ?></td> 
                                            <td><?php echo substr($member['name'], 0, 20); ?></td> 
                                            <td><?php echo $member['contact_number']; ?></td> 

                                            <td>
                                                <?php
                                                $skills = SkillDetail::GetSkillByMember($member['id']);

                                                foreach ($skills as $key => $skill) {
                                                    if ($key == 1) {
                                                        break;
                                                    }

                                                    $SKILL = new Skill($skill["skill"]);
                                                    echo $SKILL->name;
                                                }
                                                ?> 
                                            </td>

                                            <td class="text-center"> 
                                                <a href="member-skills.php?id=<?php echo $member['id']; ?> " title="Skills" class="op-link btn btn-sm btn-info"><i class="glyphicon glyphicon-star-empty"></i></a>&nbsp;&nbsp;|&nbsp;
                                                <a href="member-portfolio.php?id=<?php echo $member['id']; ?>" title="Portfolio"class="op-link btn btn-sm btn btn-warning"><i class="  glyphicon glyphicon-briefcase  "></i></a>&nbsp;&nbsp;|&nbsp;
                                                <a href="edit-member.php?id=<?php echo $member['id']; ?>" title="Edit"class="op-link btn btn-sm btn-default"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;|&nbsp;
                                                <a href="#" class="delete-member btn btn-sm btn-danger" title="Delete" data-id="<?php echo $member['id']; ?>">
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
                                        <th>NIC Number</th>
                                        <th>Name</th> 
                                        <th>Contact Number</th>
                                        <th>Skill</th>
                                        <th class="text-center">Options</th>
                                    </tr>
                                </tfoot>
                            </table>
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
        <script src="delete/js/member.js" type="text/javascript"></script>
    </body>

</html> 