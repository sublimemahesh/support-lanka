<?php

include_once(dirname(__FILE__) . '/../../class/include.php');


if (isset($_POST['register'])) {
    $COMPANY = new Company(NULL);
    $VALID = new Validator();


    $pw = md5($_POST['password']);
    $cpw = md5($_POST['confirm_password']);
    $email = $_POST['email'];
    $cemail = $_POST['cnfemail'];


    if ($cpw == $pw) {

        if ($email == $cemail) {

            $COMPANY->name = filter_input(INPUT_POST, 'name');
            $COMPANY->email = $email;
            $COMPANY->contact_number = filter_input(INPUT_POST, 'contact_number');
            $COMPANY->username = filter_input(INPUT_POST, 'username');
            $COMPANY->password = $cpw;


            $VALID->check($COMPANY, [
                'name' => ['required' => TRUE],
                'email' => ['required' => TRUE],
                'contact_number' => ['required' => TRUE],
                'username' => ['required' => TRUE],
                'password' => ['required' => TRUE]
            ]);

            if ($VALID->passed()) {
                $COMPANY->create();

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
            }
            header('location: ../profile.php?message=10');
        } else {
            header('Location: ../register.php?message=19');
        }
    } else {
        header('Location: ../register.php?message=17');
    }
}

if (isset($_POST['login'])) {

    $COMPANY = new Company(NULL);

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));



    if ($COMPANY->login($username, $password)) {
        header('Location: ../profile.php?message=5');
        exit();
    } else {
        header('Location: ../login.php?message=7');
        exit();
    }
}

if (isset($_POST['update'])) {

    $imgName = '';

    if (empty($_POST["logo_image_name"])) {

        $dir_dest = '../../upload/company/';

        $handle = new Upload($_FILES['logo_image']);

        $imgName = Helper::randamId();

        if ($handle->uploaded) {
            $handle->image_resize = true;
            $handle->file_new_name_body = TRUE;
            $handle->file_overwrite = TRUE;
            $handle->file_new_name_ext = 'jpg';
            $handle->image_ratio_crop = 'C';
            $handle->file_new_name_body = $imgName;
            $handle->image_x = 250;
            $handle->image_y = 250;

            $handle->Process($dir_dest);

            if ($handle->processed) {
                $info = getimagesize($handle->file_dst_pathname);
                $imgName = $handle->file_dst_name;
            }
        }
    } else {

        $dir_dest = '../../upload/company/';

        $handle = new Upload($_FILES['logo_image']);

        if ($handle->uploaded) {
            $handle->image_resize = true;
            $handle->file_new_name_body = TRUE;
            $handle->file_overwrite = TRUE;
            $handle->file_new_name_ext = FALSE;
            $handle->image_ratio_crop = 'C';
            $handle->file_new_name_body = $_POST["logo_image_name"];
            $handle->image_x = 250;
            $handle->image_y = 250;

            $handle->Process($dir_dest);

            if ($handle->processed) {
                $info = getimagesize($handle->file_dst_pathname);
                $imgName = $handle->file_dst_name;
            }
        }
        $imgName = $_POST["logo_image_name"];
    }

    $COMPANY = new Company($_POST['id']);

    $COMPANY->logo_image = $imgName;
    $COMPANY->name = mysql_real_escape_string($_POST['name']);
    $COMPANY->industry = filter_input(INPUT_POST, 'industry');
    $COMPANY->city = mysql_real_escape_string($_POST['city']);
    $COMPANY->company_register_number = filter_input(INPUT_POST, 'company_register_number');
    $COMPANY->address = filter_input(INPUT_POST, 'address');
    $COMPANY->since = filter_input(INPUT_POST, 'since');
    $COMPANY->team_size = filter_input(INPUT_POST, 'team_size');
    $COMPANY->about = filter_input(INPUT_POST, 'about');
    $COMPANY->contact_number = filter_input(INPUT_POST, 'contact_number');
    $COMPANY->email = mysql_real_escape_string($_POST['email']);
    $COMPANY->map = mysql_real_escape_string($_POST['map']);
    $COMPANY->username = filter_input(INPUT_POST, 'username');

    $VALID = new Validator();

    $VALID->check($COMPANY, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
        'username' => ['required' => TRUE],
        'industry' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $COMPANY->update();

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
