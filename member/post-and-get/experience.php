<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-experience'])) {

    $EXPERIENCE = New Experience(NULL);
    $VALID = new Validator();

    $EXPERIENCE->skill_detail = $_POST['skil-detail'];
    $EXPERIENCE->description = $_POST['description'];
    $EXPERIENCE->working_place = $_POST['working_place'];
    $EXPERIENCE->duration = $_POST['duration'];
    $EXPERIENCE->sort = $_POST['sort'];

    $VALID->check($EXPERIENCE, [
        'description' => ['required' => TRUE],
        'duration' => ['required' => TRUE],
        'working_place' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $EXPERIENCE->create();

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

if (isset($_POST['edit-experience'])) {

    $EXPERIENCE = New Experience($_POST['id']);
    $VALID = new Validator();

    $EXPERIENCE->description = $_POST['description'];
    $EXPERIENCE->working_place = $_POST['working_place'];
    $EXPERIENCE->duration = $_POST['duration'];

    $VALID->check($EXPERIENCE, [
        'duration' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $EXPERIENCE->update();

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

if (isset($_POST['save-changes'])) {

    foreach ($_POST['sort'] as $key => $exp) {
        $key = $key + 1;
   
        $EXPERIENCE = Experience::arrange($key, $exp);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}