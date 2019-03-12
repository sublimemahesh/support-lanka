<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

include_once(dirname(__FILE__) . '/../auth.php');

if (isset($_POST['create'])) {
    $MEMBER = new Member(NULL);
    $VALID = new Validator();

    $password = md5($_POST['password']);

    $MEMBER->name = $_POST['name'];
    $MEMBER->email = $_POST['email'];
    $MEMBER->nic_number = $_POST['nic_number'];
    $MEMBER->date_of_birthday = $_POST['date_of_birthday'];
    $MEMBER->contact_number = $_POST['contact_number'];
    $MEMBER->about_me = $_POST['about_me'];
    $MEMBER->home_address = $_POST['home_address'];
    $MEMBER->city = $_POST['city'];
    $MEMBER->privacy = $_POST['privacy'];
    $MEMBER->job_type = $_POST['job_type'];
    $MEMBER->contact_number = $_POST['contact_number'];
    $MEMBER->username = $_POST['username'];
    $MEMBER->status = $_POST['status'];
    $MEMBER->rank = $_POST['rank'];
    $MEMBER->password = $password;

    $dir_dest = '../../upload/member/';

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

    $MEMBER->profile_picture = $imgName;

    $VALID->check($MEMBER, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'nic_number' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
        'password' => ['required' => TRUE],
        'profile_picture' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $MEMBER->create();

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

if (isset($_POST['update'])) {

    $dir_dest = '../../upload/member/';

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


    $MEMBER = new Member($_POST['id']);

    $password = md5($_POST['password']);
    $MEMBER->profile_picture = $imgName;
    $MEMBER->name = $_POST['name'];
    $MEMBER->password = $password;
    $MEMBER->email = $_POST['email'];
    $MEMBER->nic_number = $_POST['nic_number'];
    $MEMBER->date_of_birthday = $_POST['date_of_birthday'];
    $MEMBER->contact_number = $_POST['contact_number'];
    $MEMBER->about_me = $_POST['about_me'];
    $MEMBER->home_address = $_POST['home_address'];
    $MEMBER->city = $_POST['city'];
    $MEMBER->username = $_POST['username'];
    $MEMBER->rank = $_POST['rank'];
    $MEMBER->job_type = $_POST['job_type'];
    $MEMBER->privacy = $_POST['privacy'];
    $MEMBER->is_active = $_POST['active'];

    $VALID = new Validator();
    $VALID->check($MEMBER, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'nic_number' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $MEMBER->update();

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