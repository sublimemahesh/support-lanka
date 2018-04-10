<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $FEEDBACK = new FeedBack($_POST['id']);
    
    unlink(Helper::getSitePath() . "upload/feedback/" . $FEEDBACK->image_name);

    $result = $FEEDBACK->delete();

    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}