<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] == 'delete') {
    $member_id =$_POST['memberid'];
    $skill_id =$_POST['skillid'];
    
    $SKILL_DETAILS = new SkillDetail(NULL);

    $result = $SKILL_DETAILS->deleteSkilldetailsByMemberAndSkill($member_id, $skill_id);

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}