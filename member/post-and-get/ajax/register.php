<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if ($_POST['save']) {

    header('Content-Type: application/json; charset=UTF8');
    $response = array();

    if (empty($_POST['nic_number'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your nic number.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['name'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your name.";
        echo json_encode($response);
        exit();
   
    }  else if (empty($_POST['contact_number'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your contact number.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['password'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter the password.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['privacy'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your privacy .";
        echo json_encode($response);
        exit();
//    } else {
//        $MEMBER = new Member(NULL);
//        $result = $MEMBER($_POST['email']);
//        if ($result) {
//            $response['status'] = 'error';
//            $response['message'] = "The email address you entered is already in use.";
//            echo json_encode($response);
//            exit();
    } else {

        $MEMBER = new Member(NULL);
        $MEMBER->nic_number =  $_POST['nic_number'];
        $MEMBER->name = $_POST['name'];
        $MEMBER->email =$_POST['email'];
        $MEMBER->profile_picture =$_POST['profile_picture'];
        $MEMBER->status =$_POST['status'];
        $MEMBER->contact_number = $_POST['contact_number'];
        $MEMBER->privacy = $_POST['privacy'];
        $MEMBER->is_active = $_POST['is_active'];
        $MEMBER->password = md5($_POST['password']);

        $MEMBER->create();

        if ($MEMBER->id) {
            $MEMBER->login($MEMBER->nic_number, $MEMBER->password);
            $response['status'] = 'success';
            echo json_encode($response);
            exit();
        } else {
            $response['status'] = 'error';
            $response['message'] = "Oops. Something went wrong, Please try again.";
            echo json_encode($response);
            exit();
        }
    }
}