<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['add-industry'])) {
    $INDUSTRY = new Industry(NULL);
    $VALID = new Validator();

    $INDUSTRY->name = filter_input(INPUT_POST, 'name');

    $VALID->check($INDUSTRY, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $INDUSTRY->create();

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

if (isset($_POST['edit-industry'])) {
    $INDUSTRY = new Industry(NULL);

    $INDUSTRY->id = $_POST['id'];
    $INDUSTRY->name = $_POST['name'];

    $VALID = new Validator();
    $VALID->check($INDUSTRY, ['name' =>
            ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $INDUSTRY->update();

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

        $INDUSTRY_t = Industry::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}