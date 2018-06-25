<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$PORTPOLIO = new Portfolio($id);
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <title>Edit Portfolio || My Account || Support Lanka</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/css/datepicker.html" />
        <link rel="stylesheet" type="text/css" href="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker.html" />
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <style>
            .img-thumbnail {
                max-width: 50% !important;
            }
        </style>
    </head> 
    <body> 
        <section id="container" > 
            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row  top-bott20"> 
                            <?php
                            $vali = new Validator();

                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Edit Portfolio</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <form class="form-horizontal" method="post" action="post-and-get/portfolio.php" enctype="multipart/form-data"> 
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="title">Title</label>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" id="Title" name="title" class="form-control" placeholder="Please Enter Title" value="<?php echo $PORTPOLIO->title; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="description">Description</label>
                                                            </div>
                                                            <div class="">
                                                                <textarea type="text" id="description" name="description" class="form-control" placeholder="Please Enter Description"><?php echo $PORTPOLIO->description; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="description">Description</label>
                                                            </div>
                                                            <div class="">
                                                                <select name="date" >
                                                                    <option>-- Year--</option>
                                                                    <option value="" ><?php $PORTPOLIO->date?></option>
                                                                </select>
                                                                <select>
                                                                    <option>-- Month --</option>
                                                                </select>
                                                                <select >
                                                                    <option>-- Date --</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="oldDis" value=""/>

                                                                <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                <input type="hidden" id="id" value="<?php echo $PORTPOLIO->id; ?>" name="id"/>
                                                                <button name="edit-portfolio" type="submit" class="btn btn-info center-block">Change</button>
                                                            </div>
                                                        </div> 
                                                    </div>  
                                                </form>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                        </div>
                    </div>
                </div>
            </section>

            <?php
            include './footer.php';
            ?>
        </section>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/js/common-scripts.js"></script>
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="assets/js/bootstrap-switch.js"></script>
        <script src="assets/js/jquery.tagsinput.js"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/date.html"></script>
        <script type="text/javascript" src="../../../blacktie.co/demo/dashgum/assets/js/bootstrap-daterangepicker/daterangepicker-2.html"></script>
        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/js/form-component.js"></script> 

        <script>
            //custom select box
            $(function () {
                $('select.styled').customSelect();
            });

        </script>
        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>

    </body>
</html>
