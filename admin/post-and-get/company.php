<?php

include_once(dirname(__FILE__) . '/../../class/include.php');


if (isset($_POST['create_company'])) {
    $COMPANY = new Company(NULL);
    $VALID = new Validator();

    $password = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    $COMPANY->name = filter_input(INPUT_POST, 'name');
    $COMPANY->industry = filter_input(INPUT_POST, 'industry');
    $COMPANY->city = filter_input(INPUT_POST, 'city');
    $COMPANY->email = filter_input(INPUT_POST, 'email');
    $COMPANY->company_register_number = filter_input(INPUT_POST, 'company_register_number');
    $COMPANY->address = filter_input(INPUT_POST, 'address');
    $COMPANY->since = filter_input(INPUT_POST, 'since');
    $COMPANY->team_size = filter_input(INPUT_POST, 'team_size');
    $COMPANY->about = filter_input(INPUT_POST, 'about');
    $COMPANY->contact_number = filter_input(INPUT_POST, 'contact_number');
    $COMPANY->map = filter_input(INPUT_POST, 'map');
    $COMPANY->username = filter_input(INPUT_POST, 'username');
    $COMPANY->rank = filter_input(INPUT_POST, 'rank');
    $COMPANY->password = $password;

    $dir_dest = '../../upload/company/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 250;
        $handle->image_y = 250;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $COMPANY->logo_image = $imgName;

    $VALID->check($COMPANY, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
        'username' => ['required' => TRUE],
        'password' => ['required' => TRUE],
        'logo_image' => ['required' => TRUE]
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

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['update_company'])) {

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
    $COMPANY->rank = filter_input(INPUT_POST, 'rank');
    $COMPANY->status = mysql_real_escape_string($_POST['active']);

    $VALID = new Validator();

    $VALID->check($COMPANY, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
        'username' => ['required' => TRUE]
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

if (isset($_POST['save-changes-company'])) {

    foreach ($_POST['sort'] as $key => $com) {
        $key = $key + 1;

        $COMPANY = Company::arrange($key, $com);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
