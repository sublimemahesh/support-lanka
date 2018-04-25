<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-award'])) {

    $AWARD = New Award(NULL);
    $VALID = new Validator();

    $AWARD->title = $_POST['title'];
    $AWARD->member = $_POST['member'];
    $AWARD->duration = $_POST['duration'];
    $AWARD->description = $_POST['description'];
    $AWARD->sort = $_POST['sort'];

    $VALID->check($AWARD, [
        'title' => ['required' => TRUE],
        'duration' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $AWARD->create();

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

if (isset($_POST['edit-award'])) {

    $AWARD = New Award($_POST['id']);
    $VALID = new Validator();

    $AWARD->title = $_POST['title'];
    $AWARD->duration = $_POST['duration'];
    $AWARD->description = $_POST['description'];

    $VALID->check($AWARD, [
        'title' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $AWARD->update();

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

if (isset($_POST['save-changes-award'])) {

    foreach ($_POST['sort'] as $key => $award) {
        $key = $key + 1;

        $AWARD = Award::arrange($key, $award);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}