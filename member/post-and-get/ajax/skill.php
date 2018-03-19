<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
if (isset($_POST['action'])) {

    $SKILL = new Skill(NULL);

    $result = $SKILL->GetSkillsByIndustry($_POST["industry"]);
    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}