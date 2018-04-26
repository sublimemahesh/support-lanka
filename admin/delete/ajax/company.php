<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] == 'delete') {
    $COMPANY = new Company($_POST['id']);
    unlink(Helper::getSitePath() . "upload/member/" . $COMPANY->logo_image);
    $result = $COMPANY->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}