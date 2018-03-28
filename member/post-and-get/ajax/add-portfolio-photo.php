<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if (isset($_POST['upload-portfolio-photo'])) {

    $folder = '../../../upload/portfolio/';
    $imgName = Helper::randamId();

    $handle = new Upload($_FILES['portfolio-picture']);

    if ($handle->uploaded) {

        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $imgName;
        $handle->image_watermark = '../../assets/img/logo-watermark.png';

        $image_dst_x = $handle->image_dst_x;
        $image_dst_y = $handle->image_dst_y;
        $newSize = Helper::calImgResize(600, $image_dst_x, $image_dst_y);

        $image_x = (int) $newSize[0];
        $image_y = (int) $newSize[1];

        $handle->image_x = $image_x;
        $handle->image_y = $image_y;

        $handle->Process($folder);

        if ($handle->processed) {

            $handle1 = new Upload($_FILES['portfolio-picture']);

            if ($handle1->uploaded) {

                $handle1->image_resize = true;
                $handle1->file_new_name_ext = 'jpg';
                $handle1->image_ratio_crop = 'C';
                $handle1->file_new_name_body = $imgName;
                $handle1->image_x = 200;
                $handle1->image_y = 200;

                $handle1->Process($folder . '/thumb');

                if ($handle1->processed) {

                    $PORTFILIO_PHOTO = new PortfolioPhoto(NULL);
                    $PORTFILIO_PHOTO->portfolio = $_POST["portfolio"];
                    $PORTFILIO_PHOTO->image_name = $handle1->file_dst_name;
                    $PORTFILIO_PHOTO->caption = "";

                    $PORTFILIO_PHOTO->create();

                    $handle1->Clean();

                    header('Content-Type: application/json');

                    $result = [
                        "filename" => $handle1->file_dst_name,
                        "id" => $PORTFILIO_PHOTO->id,
                        "message" => 'success'
                    ];
                    echo json_encode($result);
                    exit();
                } else {

                    header('Content-Type: application/json');

                    $result = [
                        "message" => 'error'
                    ];
                    echo json_encode($result);
                    exit();
                }
            } else {

                header('Content-Type: application/json');

                $result = [
                    "message" => 'error'
                ];
                echo json_encode($result);
                exit();
            }
        } else {

            header('Content-Type: application/json');

            $result = [
                "message" => 'error'
            ];
            echo json_encode($result);
            exit();
        }
    } else {

        header('Content-Type: application/json');

        $result = [
            "message" => 'error'
        ];
        echo json_encode($result);
        exit();
    }
}

if (isset($_POST['save-data'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;

        $PORTFILIO_PHOTOS = PortfolioPhoto::arrange($key, $img);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}