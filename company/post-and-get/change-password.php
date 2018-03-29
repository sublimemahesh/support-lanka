<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['changePassword'])) {

    $OldPassOk = Company::checkOldPass($_POST["id"], $_POST["oldPass"]);

    if ($_POST["newPass"] === $_POST["confPass"]) {
        if ($OldPassOk) {
            $result = Company::changePassword($_POST["id"], $_POST["newPass"]);
            if ($result == 'TRUE') {
                header('location: logout.php');
                exit();
            } else {
                header('location: ../change-password.php?message=14');
                exit();
            }
        } else {
            header('location: ../change-password.php?message=18');
            exit();
        }
    } else {
        header('location: ../change-password.php?message=17');
        exit();
    }
}

if (isset($_POST['PasswordReset'])) {
    $COMPANY = new Company(NULL);
    $code = $_POST["code"];
    $password = $_POST["password"];
    $confpassword = $_POST["confirmpassword"];

    if ($password === $confpassword && $password != NULL && $confpassword != NULL) {
        if ($COMPANY->SelectResetCode($code)) {
            $COMPANY->updatePassword($password, $code);
            header('Location: ../login.php?message=15');
        } else {
            header('Location: ../reset-password.php?message=16');
        }
    } else {
        header('Location: ../reset-password.php?message=17');
    }


//    $OldPassOk = Company::ChecknewReset($_POST["code"], $_POST["password"]);
//
//    header('Location: ../reset-password.php?message=3');
}

