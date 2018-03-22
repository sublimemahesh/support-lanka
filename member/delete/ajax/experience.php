<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');


if ($_POST['option'] == 'delete') {
    $EXPERIENCE = new Experience($_POST['id']);

    $result = $EXPERIENCE->delete();

    if ($result) {
        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}