<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-skill'])) {

    $SKILL = New Skill(NULL);
    $VALID = new Validator();

    $SKILL->industry = $_POST['industry'];
    $SKILL->name = $_POST['name'];

    $VALID->check($SKILL, [
        'industry' => ['required' => TRUE],
        'name' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $SKILL->create();

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

if (isset($_POST['edit-skill'])) {

    $SKILL = New Skill($_POST['id']);
    $VALID = new Validator();
  
    $SKILL->name = $_POST['name'];

    $VALID->check($SKILL, [
        'name' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $SKILL->update();

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

        $SKILL = Skill::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

