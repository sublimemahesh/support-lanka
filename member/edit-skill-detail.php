<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$SKILLDETAILS = new SkillDetail($id);
$SKILL = new Skill($SKILLDETAILS->skill);
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <title>Edit Skill Detail || My Account || Support Lanka</title>
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
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Edit Skill&nbsp;:&nbsp; <?php echo $SKILL->name?></div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 

                                                <form class="form-horizontal" method="post" action="post-and-get/skill-detail.php" enctype="multipart/form-data"> 
                                                    <div class="col-md-12">

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="Category">Category</label>
                                                            </div>
                                                            <div class="">
                                                                <select class="form-control show-tick place-select1" type="text" id="industry" autocomplete="off" name="industry" disabled="true">
                                                                    <option value="<?php $SKILLDETAILS->skill ?>" class="active light-c">
                                                                        <?php
                                                                        $INDU = new Industry($SKILL->industry);
                                                                        echo $INDU->name;
                                                                        ?>
                                                                    </option>
                                                                    <?php foreach (Industry::all() as $key => $indu) {
                                                                        ?>
                                                                        <option value="<?php echo $indu['id']; ?>"><?php echo $indu['name']; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="skill">Skill</label>
                                                            </div>
                                                            <div class="">
                                                                <select class="form-control show-tick place-select1" type="text" id="Skill" autocomplete="off" name="Skill" disabled="true">
                                                                    <option value="<?php echo $SKILLDETAILS->skill ?>">
                                                                        <?php
                                                                        $SKILL = new Skill($SKILLDETAILS->skill);
                                                                        echo $SKILL->name;
                                                                        ?>
                                                                    </option>
                                                                    <?php foreach (Skill::all() as $key => $skill_d) {
                                                                        ?>
                                                                        <option value="<?php echo $skill_d['id']; ?>"><?php echo $skill_d['name']; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                        <div class="hidden">
                                                            <div class="bottom-top">
                                                                <label for="sub skill">Sub Skill</label>
                                                            </div>
                                                            <div class="">
                                                                <select class="form-control" id="name" name="sub_skill">
                                                                    <option value="" > -- Please Select -- </option>
                                                                    <?php
                                                                    $SubSkill = new SubSkill(NULL);
                                                                    $sub_skills = $SubSkill->GetSubSkillsBySkill($SKILLDETAILS->skill);
                                                                    foreach ($sub_skills as $sub_skill) {
                                                                        if ($sub_skill['id'] == $SKILLDETAILS->sub_skill) {
                                                                            ?>
                                                                            <option value="<?php echo $sub_skill['id']; ?>" selected>
                                                                                <?php echo $sub_skill['name']; ?>
                                                                            </option>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <option value="<?php echo $sub_skill['id']; ?>">
                                                                                <?php echo $sub_skill['name']; ?>
                                                                            </option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>  
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="percentage">Percentage</label>
                                                            </div>
                                                            <div class="">
                                                                <select id="percentage" name="percentage" class="form-control">
                                                                    <option value=""><?php echo $SKILLDETAILS->percentage?></option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="description">Description</label>
                                                            </div>
                                                            <div class="">
                                                                <textarea type="text"  name="description" class="form-control" placeholder="Please Enter Description"><?php echo $SKILLDETAILS->description; ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="oldDis" value=""/>

                                                                <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                <input type="hidden" id="id" value="<?php echo $SKILLDETAILS->id; ?>" name="id"/>
                                                                <button name="edit-skill-details" type="submit" class="btn btn-info center-block">Change</button>
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

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <!--custom switch-->
        <script src="assets/js/bootstrap-switch.js"></script>

        <!--custom tagsinput-->
        <script src="assets/js/jquery.tagsinput.js"></script>

        <!--custom checkbox & radio-->

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
