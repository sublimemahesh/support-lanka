<?php

include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');


if (isset($_POST['add-massage-request'])) {
dd($_POST['add-massage-request']);
    $MESSAGEREQUEST = New MessageRequest(NULL);
    
    $VALID = new Validator();

    $MESSAGEREQUEST->date = $_POST['date'];
    $MESSAGEREQUEST->company = $_POST['company'];
    $MESSAGEREQUEST->member = $_POST['member'];
    $MESSAGEREQUEST->vacancy = $_POST['vacancy'];
    $MESSAGEREQUEST->contact = $_POST['contact'];
    $MESSAGEREQUEST->email = $_POST['email'];
    $MESSAGEREQUEST->title = $_POST['title'];
    $MESSAGEREQUEST->message = $_POST['message'];

    $VALID->check($MESSAGEREQUEST, [
        'date' => ['required' => TRUE],
        'title' => ['required' => TRUE],
        'contact' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'message' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $MESSAGEREQUEST->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['edit-massage-request'])) {

    $MESSAGEREQUEST = New MessageRequest($_POST['id']);
    $VALID = new Validator();

    $MESSAGEREQUEST->contact = $_POST['contact'];
    $MESSAGEREQUEST->email = $_POST['email'];
    $MESSAGEREQUEST->title = $_POST['title'];
    $MESSAGEREQUEST->message = $_POST['message'];

    $VALID->check($MESSAGEREQUEST, [
        'title' => ['required' => TRUE],
        'message' => ['required' => TRUE],
        'contact' => ['required' => TRUE],
        'email' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $MESSAGEREQUEST->update();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your changes saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}