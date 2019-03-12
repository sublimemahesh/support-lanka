<?php

include_once(dirname(__FILE__) . '/../../class/include.php');


if (isset($_POST['create_company'])) {
    $COMPANY = new Company(NULL);
    $VALID = new Validator();

    $password = md5($_POST['password']);

    $COMPANY->name = $_POST['name'];
    $COMPANY->industry = $_POST['industry'];
    $COMPANY->city = $_POST['city'];
    $COMPANY->email = $_POST['email'];
    $COMPANY->company_register_number = $_POST['company_register_number'];
    $COMPANY->address = $_POST['address'];
    $COMPANY->since = $_POST['since'];
    $COMPANY->team_size = $_POST['team_size'];
    $COMPANY->about = $_POST['about'];
    $COMPANY->contact_number = $_POST['contact_number'];
    $COMPANY->map = $_POST['map'];
    $COMPANY->status = $_POST['status'];
    $COMPANY->username = $_POST['username'];
    $COMPANY->rank = $_POST['rank'];
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
        'industry' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
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
    $COMPANY->name = $_POST['name'];
    $COMPANY->industry = $_POST['industry'];
    $COMPANY->city = $_POST['city'];
    $COMPANY->email = $_POST['email'];
    $COMPANY->company_register_number = $_POST['company_register_number'];
    $COMPANY->address = $_POST['address'];
    $COMPANY->since = $_POST['since'];
    $COMPANY->team_size = $_POST['team_size'];
    $COMPANY->about = $_POST['about'];
    $COMPANY->contact_number = $_POST['contact_number'];
    $COMPANY->map = $_POST['map'];
    $COMPANY->status = $_POST['active'];
    $COMPANY->username = $_POST['username'];
    $COMPANY->rank = $_POST['rank'];

    $VALID = new Validator();

    $VALID->check($COMPANY, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'address' => ['required' => TRUE],
        'industry' => ['required' => TRUE],
        'city' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE]
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
