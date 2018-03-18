<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-qualification'])) {

    $QUALIFICATION = New Qualification(NULL);
    $VALID = new Validator();

    $QUALIFICATION->skill = $_POST['skill'];
    $QUALIFICATION->name = $_POST['name'];

    $VALID->check($QUALIFICATION, [
        'skill' => ['required' => TRUE],
        'name' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $QUALIFICATION->create();

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

if (isset($_POST['edit-qualification'])) {

    $QUALIFICATION = New Qualification($_POST['id']);
    $VALID = new Validator();

    $QUALIFICATION->name = $_POST['name'];

    $VALID->check($QUALIFICATION, [
        'name' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $QUALIFICATION->update();

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

if (isset($_POST['save-data'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $QUALIFICATION = Qualification::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}