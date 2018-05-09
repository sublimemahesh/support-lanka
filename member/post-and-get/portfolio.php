<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-portfolio'])) {

    $PORTFILIO = New Portfolio(NULL);
    $VALID = new Validator();

    $PORTFILIO->skill_detail = $_POST['skill-detail'];
    $PORTFILIO->title = $_POST['title'];
    $PORTFILIO->date = $_POST['date'];
    $PORTFILIO->description = $_POST['description'];
    $PORTFILIO->sort = $_POST['sort'];

    $VALID->check($PORTFILIO, [
        'title' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $PORTFILIO->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

          header("location: ../manage-portfolio.php");
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['edit-portfolio'])) {

    $PORTFILIO = New Portfolio($_POST['id']);
    $VALID = new Validator();

    $PORTFILIO->title = $_POST['title'];
    $PORTFILIO->description = $_POST['description'];

    $VALID->check($PORTFILIO, [
        'title' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $PORTFILIO->update();

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

if (isset($_POST['arrange-portfolio'])) {
   
    foreach ($_POST['sort'] as $key => $portf) {

        $key++;

        $PORTFILIO = Portfolio::arrange($key, $portf);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}