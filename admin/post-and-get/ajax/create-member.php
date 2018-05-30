
<?php

include_once(dirname(__FILE__) . '/../../../class/include.php');

if ($_POST['save']) {
     
    header('Content-Type: application/json; charset=UTF8');
    $response = array();

    if (empty($_POST['name'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your name.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['email'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your email.";
        echo json_encode($response);
        exit();
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $response['status'] = 'error';
        $response['message'] = "Please enter valid email.";
        echo json_encode($response);
        exit();
    } else if (empty($_POST['contact_number'])) {
        $response['status'] = 'error';
        $response['message'] = "Please enter your contact number.";
        echo json_encode($response);
        exit();
//    } else if (empty($_POST['nic_number'])) {
//        $response['status'] = 'error';
//        $response['message'] = "Please enter your nic number.";
//        echo json_encode($response);
//        exit();
//    } else if (empty($_POST['home_address'])) {
//        $response['status'] = 'error';
//        $response['message'] = "Please enter your home address.";
//        echo json_encode($response);
//        exit();
//    } else if (empty($_POST['city'])) {
//        $response['status'] = 'error';
//        $response['message'] = "Please enter your city.";
//        echo json_encode($response);
//        exit();
//    } else if (empty($_POST['date_of_birthday'])) {
//        $response['status'] = 'error';
//        $response['message'] = "Please enter date of birthday.";
//        echo json_encode($response);
//        exit();
//    } else if (empty($_POST['password'])) {
//        $response['status'] = 'error';
//        $response['message'] = "Please enter the password.";
//        echo json_encode($response);
//        exit();
//    } else if (empty($_POST['privacy'])) {
//        $response['status'] = 'error';
//        $response['message'] = "Please enter the privacy.";
//        echo json_encode($response);
//        exit();
//    } else {
//        $MEMBER = new Member(NULL);
//        $result = $MEMBER->checkEmail($_POST['email']);
//        if ($result) {
//            $response['status'] = 'error';
//            $response['message'] = "The email address you entered is already in use.";
//            echo json_encode($response);
//            exit();
        } else {

            $MEMBER = new Member(NULL);

            $MEMBER->username = filter_input(INPUT_POST, 'username');
            $MEMBER->name = filter_input(INPUT_POST, 'name');
            $MEMBER->email = filter_input(INPUT_POST, 'email');
            $MEMBER->contact_number = filter_input(INPUT_POST, 'contact_number');
            $MEMBER->about_me = filter_input(INPUT_POST, 'about_me');
            $MEMBER->city = filter_input(INPUT_POST, 'city');
            $MEMBER->rank = filter_input(INPUT_POST, 'rank');
            $MEMBER->status = filter_input(INPUT_POST, 'status');
            $MEMBER->date_of_birthday = filter_input(INPUT_POST, 'date_of_birthday');
            $MEMBER->home_address = filter_input(INPUT_POST, 'home_address');
            $MEMBER->nic_number = filter_input(INPUT_POST, 'nic_number');
            $MEMBER->password = md5(filter_input(INPUT_POST, 'password'));
            $MEMBER->privacy = filter_input(INPUT_POST, 'privacy');
 
            $dir_dest = '../../../upload/member/';

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
            $MEMBER->create();

            if ($MEMBER->id) {
                $response['status'] = 'success';
                echo json_encode($response);
                exit();
            } else {
                $response['status'] = 'error';
                $response['message'] = "Oops. Something went wrong, Please try again.";
                echo json_encode($response);
                exit();
            }
        }
    
}
