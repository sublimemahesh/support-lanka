<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $INDUSTRY = new Industry($_POST['id']);
    
    unlink(Helper::getSitePath() . "upload/industry/" . $INDUSTRY->image_name);
    unlink(Helper::getSitePath() . "upload/industry/thumb/" . $INDUSTRY->image_name);

    $result = $INDUSTRY->delete();

    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}