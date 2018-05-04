<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-skill-details'])) {

    $SKILLDETAILS = New SkillDetail(NULL);
    $VALID = new Validator();

    $SKILLDETAILS->member = $_POST['member'];
    $SKILLDETAILS->skill = $_POST['skill'];
    $SKILLDETAILS->sub_skill = $_POST['sub_skill'];
    $SKILLDETAILS->percentage = $_POST['percentage'];
    $SKILLDETAILS->description = $_POST['description'];

    $VALID->check($SKILLDETAILS, [
        'skill' => ['required' => TRUE],
        'percentage' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $SKILLDETAILS->create();

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

if (isset($_POST['edit-skill-details'])) {

    $SKILLDETAILS = New SkillDetail($_POST['id']);
    $VALID = new Validator();

    $SKILLDETAILS->sub_skill = $_POST['sub_skill'];
    $SKILLDETAILS->percentage = $_POST['percentage'];
    $SKILLDETAILS->description = $_POST['description'];

    $VALID->check($SKILLDETAILS, [
        'percentage' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $SKILLDETAILS->update();

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