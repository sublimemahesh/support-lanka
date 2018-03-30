<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . './auth.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Vacancy || Company || Support Lanka </title>

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/to-do.css">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>

        <section id="container" >
            <?php
            include './header-nav.php';
            ?>
            <section id="main-content">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row top-bott20"> 
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-random"></i> Arrange Vacancy</div>
                                <div class="panel-body">
                                    <div class="userccount">
                                        <div class="formpanel">
                                            <section class="task-panel tasks-widget">
                                                <form method="post" action="post-and-get/vacancy.php" class="form-horizontal" >
                                                    <div class="task-content">
                                                        <div id="sortable" class="task-list">
                                                            <?php
                                                            $VACANCY = new Vacancy(NULL);

                                                            foreach ($VACANCY->GetVacancyByCompany($_SESSION['id_com']) as $key => $vacan) {
                                                                ?>
                                                                <div class="col-md-12 task-br">
                                                                    <div class="task-title">
                                                                        <div class="number-class">(<?php echo $key + 1; ?>)</div>
                                                                        <div class="col-md-3 task-title-sp">
                                                                            <b>Title : </b>
                                                                            <?php echo $vacan['title']; ?> 
                                                                        </div>
                                                                        <div class="col-md-3 task-title-sp">
                                                                            <b>Designation : </b>
                                                                            <?php echo $vacan['designation']; ?>
                                                                        </div>
                                                                        <div class="col-md-3 task-title-sp">
                                                                            <b>Salary : </b>
                                                                            <?php echo $vacan['salary']; ?>
                                                                        </div>
                                                                        <div class="col-md-3 task-title-sp">
                                                                            <b>Deadline : </b>
                                                                            <?php echo $vacan['deadline']; ?>
                                                                        </div>
                                                                        
                                                                        <input type="hidden" name="sort[]"  value="<?php echo $vacan["id"]; ?>" class="sort-input"/>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?> 
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 text-center bottom-top-btn">

                                                                <input type="submit" class="btn btn-info" id="btn-submit" value="Save Changes" name="arrange-vacancy">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>  
                                            </section>
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
        <script src="assets/js/jquery-ui.js"></script>    
        <script src="assets/js/tasks.js" type="text/javascript"></script>
        <script>

            $(function () {
                $("#sortable").sortable();
                $("#sortable").disableSelection();
            });

        </script>

    </body>

</html>
