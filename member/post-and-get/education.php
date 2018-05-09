<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-education'])) {

    $EDUCATION = New Education(NULL);
    $VALID = new Validator();

    $EDUCATION->member = $_POST['member'];
    $EDUCATION->institute = $_POST['institute'];
    $EDUCATION->title = $_POST['title'];
    $EDUCATION->duration = $_POST['duration'];
    $EDUCATION->stream = $_POST['stream'];
    $EDUCATION->description = $_POST['description'];

    $VALID->check($EDUCATION, [
        'member' => ['required' => TRUE],
        'institute' => ['required' => TRUE],
        'title' => ['required' => TRUE],
        'duration' => ['required' => TRUE],
        'stream' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $EDUCATION->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();
        
        header("location: ../manage-education.php");
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['edit-education'])) {

    $EDUCATION = New Education($_POST['id']);
    $VALID = new Validator();

    $EDUCATION->institute = $_POST['institute'];
    $EDUCATION->title = $_POST['title'];
    $EDUCATION->duration = $_POST['duration'];
    $EDUCATION->stream = $_POST['stream'];
    $EDUCATION->description = $_POST['description'];

    $VALID->check($EDUCATION, [
        'institute' => ['required' => TRUE],
        'title' => ['required' => TRUE],
        'duration' => ['required' => TRUE],
        'stream' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $EDUCATION->update();

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



