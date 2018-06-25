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
                                                                <label for="description">Date</label>
                                                            </div>
                                                            <div class="">
                                                                <lable>Year</lable>
                                                                <select name="year">
                                                                    <option><?php echo substr($PORTPOLIO->date, 0, 4) ?></option>
                                                                     <option>2018</option>
                                                                     <option>2019</option>
                                                                     <option>2020</option>
                                                                     <option>2021</option>
                                                                     <option>2022</option>
                                                                     <option>2023</option>
                                                                     <option>2024</option>
                                                                     <option>2025</option>
                                                                     <option>2026</option>
                                                                     <option>2027</option>
                                                                     <option>2028</option>
                                                                     <option>2029</option>
                                                                     <option>2030</option>
                                                                     <option>2031</option>
                                                                     <option>2032</option>
                                                                     <option>2033</option>
                                                                     <option>2034</option>
                                                                     <option>2035</option>
                                                                     <option>2036</option>
                                                                     <option>2037</option>
                                                                     <option>2038</option>
                                                                     <option>2039</option>
                                                                     <option>2040</option>
                                                                     <option>2041</option>
                                                                     <option>2042</option>
                                                                     <option>2043</option>
                                                                     <option>2044</option>
                                                                     <option>2045</option>
                                                                     <option>2046</option>
                                                                     <option>2047</option>
                                                                     <option>2048</option>
                                                                     <option>2049</option>
                                                                     <option>2050</option>
                                                                </select >
                                                                <lable>Month</lable>
                                                                <select name="month">
                                                                    <option><?php echo substr($PORTPOLIO->date, 4, 4) ?></option>
                                                                    <option>-01-</option>
                                                                    <option>-02-</option>
                                                                    <option>-03-</option>
                                                                    <option>-04-</option>
                                                                    <option>-05-</option>
                                                                    <option>-06-</option>
                                                                    <option>-07-</option>
                                                                    <option>-08-</option>
                                                                    <option>-09-</option>
                                                                    <option>-10-</option>
                                                                    <option>-11-</option>
                                                                    <option>-12-</option>
                                                                </select>
                                                                <lable>Date</lable>
                                                                <select name="date">
                                                                    <option><?php echo substr($PORTPOLIO->date, 8, 4) ?></option>
                                                                     <option>-01-</option>
                                                                     <option>-02-</option>
                                                                     <option>-03-</option>
                                                                     <option>-04-</option>
                                                                     <option>-05-</option>
                                                                     <option>-06-</option>
                                                                     <option>-07-</option>
                                                                     <option>-08-</option>
                                                                     <option>-09-</option>
                                                                     <option>-10-</option>
                                                                     <option>-11-</option>
                                                                     <option>-12-</option>
                                                                     <option>-13-</option>
                                                                     <option>-14-</option>
                                                                     <option>-15-</option>
                                                                     <option>-16-</option>
                                                                     <option>-17-</option>
                                                                     <option>-18-</option>
                                                                     <option>-19-</option>
                                                                     <option>-20-</option>
                                                                     <option>-21-</option>
                                                                     <option>-22-</option>
                                                                     <option>-23-</option>
                                                                     <option>-24-</option>
                                                                     <option>-25-</option>
                                                                     <option>-26-</option>
                                                                     <option>-27-</option>
                                                                     <option>-28-</option>
                                                                     <option>-29-</option>
                                                                     <option>-30-</option>
                                                                     <option>-31-</option>
                                                                </select>
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
