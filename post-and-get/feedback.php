<?php

include_once(dirname(__FILE__) . '/../class/include.php');


if (isset($_POST['create-comment'])) {

    $FEEDBACK = new FeedBack(NULL);
    $VALID = new Validator();

    date_default_timezone_set('Asia/Colombo');

    $FEEDBACK->date_time = date("Y-m-d H:i:s");
    $FEEDBACK->name = filter_input(INPUT_POST, 'name');
    $FEEDBACK->comment = filter_input(INPUT_POST, 'comment');
    $FEEDBACK->is_active = filter_input(INPUT_POST, '0');

    $dir_dest = '../upload/feedback/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 300;
        $handle->image_y = 300;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    
    $FEEDBACK->image_name = $imgName;

    $VALID->check($FEEDBACK, [
        'name' => ['required' => TRUE],
        'comment' => ['required' => TRUE]
    ]);

    if ($VALID->passed()) {
        $FEEDBACK->create();

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







