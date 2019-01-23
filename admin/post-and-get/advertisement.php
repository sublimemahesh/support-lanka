<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $ADVERTISEMENT = new Advertisement(NULL);
    $VALID = new Validator();


    $ADVERTISEMENT->title = $_POST['title'];
    $ADVERTISEMENT->description = $_POST['description'];

/////////////////////////////////////////////////////////

    $dir_dest_addvertisement = '../../upload/advertisement/';
    $dir_dest_addvertisement_thumb = '../../upload/advertisement/thumb/';

    $handle = new Upload($_FILES['image_name']);

    $img_name = null;
    $img = Helper::randamId();

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        $image_dst_x = $handle->image_dst_x;
        $image_dst_y = $handle->image_dst_y;
        $newSize = Helper::calImgResize(1200, $image_dst_x, $image_dst_y);

        $image_x = (int) $newSize[0];
        $image_y = (int) $newSize[1];

        $handle->image_x = $image_x;
        $handle->image_y = $image_y;

        $handle->Process($dir_dest_addvertisement);
        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $img_name = $handle->file_dst_name;
        }

        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        $handle->image_x = 335;
        $handle->image_y = 220;

        $handle->Process($dir_dest_addvertisement_thumb);

        if ($handle->processed) {

            $info = getimagesize($handle->file_dst_pathname);

            $img_name = $handle->file_dst_name;
        }
    }

    $ADVERTISEMENT->image_name = $img_name;
////////////////////////////////////////////////



    $VALID->check($ADVERTISEMENT, [
        'title' => ['required' => TRUE],
    ]);

    if ($VALID->passed()) {
        $ADVERTISEMENT->create();

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

    ////////////////////////////////////////////////

    $dir_dest_addvertisement = '../../upload/advertisement/';
    $dir_dest_addvertisement_thumb = '../../upload/advertisement/thumb/';
    
    $handle_br = new Upload($_FILES['image_name']);

    if ($handle_br->uploaded) {

        if (empty($_POST["oldImageName"])) {
            $handle_br->image_resize = true;
            $handle_br->file_new_name_ext = 'jpg';
            $handle_br->image_ratio_crop = 'C';
            $handle_br->file_new_name_body = Helper::randamId();
        } else {
            $handle_br->image_resize = true;
            $handle_br->file_new_name_body = TRUE;
            $handle_br->file_overwrite = TRUE;
            $handle_br->file_new_name_ext = FALSE;
            $handle_br->image_ratio_crop = 'C';
            $handle_br->file_new_name_body = $_POST["oldImageName"];
        }

        $image_dst_x = $handle_br->image_dst_x;
        $image_dst_y = $handle_br->image_dst_y;
        $newSize = Helper::calImgResize(1200, $image_dst_x, $image_dst_y);

        $image_x = (int) $newSize[0];
        $image_y = (int) $newSize[1];

        $handle_br->image_x = $image_x;
        $handle_br->image_y = $image_y;

        $handle_br->Process($dir_dest_addvertisement);

        if (empty($_POST["oldImageName"])) {
            $handle_br->image_resize = true;
            $handle_br->file_new_name_body = TRUE;
            $handle_br->file_new_name_ext = FALSE;
            $handle_br->image_ratio_crop = 'C';
            $handle_br->file_new_name_body = $handle_br->file_dst_name;
        } else {
            $handle_br->image_resize = true;
            $handle_br->file_new_name_body = TRUE;
            $handle_br->file_overwrite = TRUE;
            $handle_br->file_new_name_ext = FALSE;
            $handle_br->image_ratio_crop = 'C';
            $handle_br->file_new_name_body = $_POST["oldImageName"];
        }

        $handle_br->image_x = 335;
        $handle_br->image_y = 220;

        $handle_br->Process($dir_dest_addvertisement_thumb);

        $ADVERTISEMENT->image_name = $handle_br->file_dst_name;
    }

    ///////////////////////////////////////////////////////////

    $ADVERTISEMENT = new Advertisement($_POST['id']);

   
    $ADVERTISEMENT->title = $_POST['title'];
    $ADVERTISEMENT->description = $_POST['description'];

    $VALID = new Validator();
    $VALID->check($ADVERTISEMENT, [
        'title' => ['required' => TRUE],
        
    ]);

    if ($VALID->passed()) {
        $ADVERTISEMENT->update();

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

        $ADVERTISEMENT = Advertisement::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

