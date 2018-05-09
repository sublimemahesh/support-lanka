<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['action'] == 'GETSUBSKILLSBYSKILL') {


    $SUB_SKILL = new SubSkill(NULL);

    $result = $SUB_SKILL->GetSubSkillsBySkill($_POST["skill"]);
    
    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}


if ($_POST['action'] == 'CHECKSUBSKILLISEXIST') {

    $SKILLDETAILS = new SkillDetail(NULL);

    $result = $SKILLDETAILS->CheckSubSkillIsExisByMember($_SESSION['id'], $_POST["skill"]);

    echo json_encode(['result' => $result]);
    header('Content-type: application/json');
    exit();
}