<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-sub-skill'])) {

    $SUB_SKILL = new Sub_skill(NULL);
    $VALID = new Validator();

    $SUB_SKILL->skill = $_POST['skill'];
    $SUB_SKILL->name = $_POST['name'];

    $VALID->check($SUB_SKILL, [
        'skill' => ['required' => TRUE],
        'name' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $SUB_SKILL->create();

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


if (isset($_POST['edit-sub-skill'])) {
    
    $SUB_SKILL = new Sub_skill($_POST['id']);
 
    $VALID = new Validator();

//    $SUB_SKILL->skill = $_POST['skill'];
    $SUB_SKILL->name = $_POST['name'];

    $VALID->check($SUB_SKILL, [
//        'skill' => ['required' => TRUE],
        'name' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $SUB_SKILL->update();

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
?>