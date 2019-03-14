<?php

include '../class/include.php';
header('Content-Type: application/json; charset=UTF8');
session_start();

if ($_SESSION['CAPTCHACODE'] != $_POST['captchacode']) {

    $result = ["status" => 'error'];
    echo json_encode($result);
    exit();
} else {
  
    $COMMENT = new Comments(NULL);

    $COMMENT->member = $_POST['id'];
    $COMMENT->name = $_POST['name'];
    $COMMENT->email = $_POST['email'];
    $COMMENT->mobile = $_POST['mobile'];
    $COMMENT->comment = $_POST['comment'];
    $COMMENT->is_active = 0;
 
    $COMMENT->create();


    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
?>
