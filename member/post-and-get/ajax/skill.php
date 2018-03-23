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

    $result = $SKILLDETAILS->CheckSkillIsExisByMember($_SESSION['id'], $_POST["skillId"]);

    echo json_encode(['result' => $result]);
    header('Content-type: application/json');
    exit();
}