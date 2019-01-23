<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $ADVERTISEMENT = new Advertisement($_POST['id']);

    unlink(Helper::getSitePath() . "upload/advertisement/" . $ADVERTISEMENT->image_name);
    unlink(Helper::getSitePath() . "upload/advertisement/thumb/" . $ADVERTISEMENT->image_name);

    $result = $ADVERTISEMENT->delete();

    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}