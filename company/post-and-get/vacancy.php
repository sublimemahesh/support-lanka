<?php

include_once(dirname(__FILE__) . '/../../class/include.php');
include_once(dirname(__FILE__) . '/../auth.php');


if (isset($_POST['add-vacancy'])) {

    $VACANCY = New Vacancy(NULL);
    $VALID = new Validator();

    $VACANCY->company = $_POST['company'];
    $VACANCY->title = $_POST['title'];
    $VACANCY->designation = $_POST['designation'];
    $VACANCY->salary = $_POST['salary'];
    $VACANCY->age = $_POST['age'];
    $VACANCY->gender = $_POST['gender'];
    $VACANCY->deadline = $_POST['deadline'];
    $VACANCY->job_type = $_POST['job_type'];
    $VACANCY->description = $_POST['description'];
    $VACANCY->status = $_POST['status'];
    $VACANCY->rank = $_POST['rank'];
    $VACANCY->sort = $_POST['sort'];

    $VALID->check($VACANCY, [
        'title' => ['required' => TRUE],
        'designation' => ['required' => TRUE],
        'gender' => ['required' => TRUE],
        'deadline' => ['required' => TRUE],
        'job_type' => ['required' => TRUE],
        'description' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $VACANCY->create();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your data was saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        
        header("location: ../manage-vacancy.php");
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['edit-vacancy'])) {

    $VACANCY = New Vacancy($_POST['id']);
    $VALID = new Validator();

    $VACANCY->title = $_POST['title'];
    $VACANCY->designation = $_POST['designation'];
    $VACANCY->salary = $_POST['salary'];
    $VACANCY->age = $_POST['age'];
    $VACANCY->gender = $_POST['gender'];
    $VACANCY->deadline = $_POST['deadline'];
    $VACANCY->job_type = $_POST['job_type'];
    $VACANCY->description = $_POST['description'];
    $VACANCY->status = $_POST['status'];
    $VACANCY->sort = $_POST['sort'];

    $VALID->check($VACANCY, [
        'title' => ['required' => TRUE],
        'designation' => ['required' => TRUE],
        'gender' => ['required' => TRUE],
        'deadline' => ['required' => TRUE],
        'job_type' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $VACANCY->update();

        if (!isset($_SESSION)) {
            session_start();
        }
        $VALID->addError("Your changes saved successfully", 'success');
        $_SESSION['ERRORS'] = $VALID->errors();

        header("location: ../manage-vacancy.php");
    } else {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['ERRORS'] = $VALID->errors();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['arrange-vacancy'])) {

    foreach ($_POST['sort'] as $key => $vacan) {

        $key++;

        $VACANCY = Vacancy::arrange($key, $vacan);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}