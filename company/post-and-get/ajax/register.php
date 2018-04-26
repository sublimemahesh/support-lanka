<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if ($_POST['save']) {

    header('Content-Type: application/json; charset=UTF8');
    $response = array();

    if (empty($_POST['name'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your name.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['email'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your email.";
        echo json_encode($response);
        exit();
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $response['status'] = 'error';
        $response['message'] = "Please enter valid email.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['contact_number'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your contact number.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['password'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter the password.";
        echo json_encode($response);
        exit();
    } else {
        $COMPANY = new Company(NULL);
        $result = $COMPANY->checkEmail($_POST['email']);
        if ($result) {
            $response['status'] = 'error';
            $response['message'] = "The email address you entered is already in use.";
            echo json_encode($response);
            exit();
        } else {

            $COMPANY = new Company(NULL);

            $COMPANY->name = filter_input(INPUT_POST, 'name');
            $COMPANY->email = filter_input(INPUT_POST, 'email');
            $COMPANY->logo_image = filter_input(INPUT_POST, 'logo_image');
            $COMPANY->status = filter_input(INPUT_POST, 'status');
            $COMPANY->contact_number = filter_input(INPUT_POST, 'contact_number');
            $COMPANY->password = md5(filter_input(INPUT_POST, 'password'));

            $COMPANY->create();

            if ($COMPANY->id) {
                $COMPANY->login($COMPANY->email,$COMPANY->password);
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
}