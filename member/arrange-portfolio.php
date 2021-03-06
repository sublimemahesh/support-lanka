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

        <title>Portfolio || My Account || Support Lanka</title>

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
                                <div class="panel-heading"><i class="fa fa-random"></i> Arrange Portfolio</div>
                                <div class="panel-body">
                                    <div class="userccount">
                                        <div class="formpanel">
                                            <section class="task-panel tasks-widget">
                                                <form method="post" action="post-and-get/portfolio.php" class="form-horizontal" >
                                                    <div class="task-content">
                                                        <div id="sortable" class="task-list">
                                                            <?php
                                                            $PORTFOLIO = new Portfolio(NULL);
                                                            foreach ($PORTFOLIO->GetPortfolioByMember($_SESSION['id']) as $key => $portf) {
                                                                ?>
                                                                <div class="col-md-12 task-br">
                                                                    <div class="task-title">
                                                                        <div class="number-class">
                                                                            (<?php echo $key; ?>)
                                                                        </div>
                                                                        <div class="col-md-4 task-title-sp">
                                                                            <b>Skill : </b>
                                                                            <?php
                                                                            $SKILL = new SkillDetail($portf['skill_detail']);
                                                                            $SKILL_D = new Skill($SKILL->skill);
                                                                            echo $SKILL_D->name;
                                                                            ?>
                                                                        </div>
                                                                        <div class="col-md-4 task-title-sp">
                                                                            <b>Title : </b>
                                                                            <?php echo $portf['title']; ?> 
                                                                        </div>
                                                                        <div class="col-md-4 task-title-sp">
                                                                            <b>Date : </b>
                                                                            <?php echo $portf['date']; ?>
                                                                        </div>
                                                                        <input type="hidden" name="sort[]"  value="<?php echo $portf["id"]; ?>" class="sort-input"/>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?> 
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 text-center bottom-top-btn">

                                                                <input type="submit" class="btn btn-info" id="btn-submit" value="Save Changes" name="arrange-portfolio">
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
