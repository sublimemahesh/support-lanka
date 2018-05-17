<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['action'] == 'GETSKILLSBYINDUSTRY') {

    $SKILL = new Skill(NULL);

    $result = $SKILL->GetSkillsByIndustry($_POST["industry"]);
    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}


if ($_POST['action'] == 'CHECKSKILLISEXIST') {

    $SKILLDETAILS = new SkillDetail(NULL);

    $result = $SKILLDETAILS->CheckSkillIsExisByMember($_POST["memberId"], $_POST["skillId"]);

    if ($result == TRUE) {
        echo json_encode(['result' => TRUE]);
        header('Content-type: application/json');
        exit();
    } else {
        echo json_encode(['result' => FALSE]);
        header('Content-type: application/json');
        exit();
    }
}