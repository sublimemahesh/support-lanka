<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');
include_once(dirname(__FILE__) . '/../../auth.php');

if ($_POST['option'] == 'delete') {

    $PORTFILIO_PHOTO = new PortfolioPhoto($_POST['id']);
    
    unlink(Helper::getSitePath() . "upload/portfolio/" . $PORTFILIO_PHOTO->image_name);
    unlink(Helper::getSitePath() . "upload/portfolio/thumb/" . $PORTFILIO_PHOTO->image_name);

    $result = $PORTFILIO_PHOTO->delete();

    if ($result) {

        $data = array("status" => TRUE);
        header('Content-type: application/json');
        echo json_encode($data);
    }
}

