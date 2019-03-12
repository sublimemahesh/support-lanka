<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['login'])) {

    $MEMBER = new Member(NULL);

    $nic_number = $_POST['nic_number'];
    $password = md5($_POST['password']);

    if ($MEMBER->login($nic_number, $password)) {
        header('Location: ../index.php?message=5');
        exit();
    } else {
        header('Location: ../login_1.php?message=7');
        exit();
    }
}

if (isset($_POST['update'])) {

    $imgName = '';

    if (empty($_POST["profile_picture_name"])) {

        $dir_dest = '../../upload/member/';

        $handle = new Upload($_FILES['profile_picture']);

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

        $dir_dest = '../../upload/member/';

        $handle = new Upload($_FILES['profile_picture']);

        if ($handle->uploaded) {
            $handle->image_resize = true;
            $handle->file_new_name_body = TRUE;
            $handle->file_overwrite = TRUE;
            $handle->file_new_name_ext = FALSE;
            $handle->image_ratio_crop = 'C';
            $handle->file_new_name_body = $_POST["profile_picture_name"];
            $handle->image_x = 250;
            $handle->image_y = 250;

            $handle->Process($dir_dest);

            if ($handle->processed) {
                $info = getimagesize($handle->file_dst_pathname);
                $imgName = $handle->file_dst_name;
            }
        }
        $imgName = $_POST["profile_picture_name"];
    }

    $MEMBER = new Member($_POST['id']);

    $MEMBER->profile_picture = $imgName;
    $MEMBER->name = $_POST['name'];
    $MEMBER->email = $_POST['email'] ;
    $MEMBER->nic_number = $_POST['nic_number'] ;
    $MEMBER->date_of_birthday = $_POST['date_of_birthday'] ;
    $MEMBER->contact_number =$_POST['contact_number'] ;
    $MEMBER->about_me =$_POST['about_me'];
    $MEMBER->home_address =$_POST['home_address'];
    $MEMBER->city =$_POST['city'];
    $MEMBER->privacy = $_POST['privacy'];
    $MEMBER->job_type = $_POST['job_type'];
    $MEMBER->contact_number =$_POST['contact_number'] ;


    $VALID = new Validator();

    $VALID->check($MEMBER, [
        'name' => ['required' => TRUE],
        'email' => ['required' => TRUE],
        'nic_number' => ['required' => TRUE],
        'contact_number' => ['required' => TRUE],
        'city' => ['required' => TRUE]
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