<?php

include_once(dirname(__FILE__) . '/../class/include.php');

if (isset($_POST['new-messages'])) {

    $MESSAGEREQUEST = New MessageRequest(NULL);
    $VALID = new Validator();

    date_default_timezone_set('Asia/Colombo');

    $MESSAGEREQUEST->date = date("Y-m-d H:i:s");
    $MESSAGEREQUEST->company = NULL;
    $MESSAGEREQUEST->member = NULL;
    $MESSAGEREQUEST->vacancy = $_POST['vacancy'];
    $MESSAGEREQUEST->contact = $_POST['contact'];
    $MESSAGEREQUEST->email = $_POST['email'];
    $MESSAGEREQUEST->title = $_POST['title'];
    $MESSAGEREQUEST->message = $_POST['message'];

    $VALID->check($MESSAGEREQUEST, [
        'title' => ['required' => TRUE],
        'contact' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'message' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $MESSAGEREQUEST->create();
        header('Content-Type: application/json');
        $result = [
            "status" => 'save'
        ];
    } else {
        header('Content-Type: application/json');
        $result = [
            "status" => 'error'
        ];
    }
    echo json_encode($result);
    exit();
}