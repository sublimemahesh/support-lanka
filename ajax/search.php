<?php

include_once(dirname(__FILE__) . '/../class/include.php');

if ($_POST['action'] == 'SEARCH') {

    $INDUSTRY = new Industry(NULL);

    $result = $INDUSTRY->getIndustryByKeyword($_POST['keyword']);

    echo json_encode(['data' => $result]);
    header('Content-type: application/json');
    exit();
}

if ($_POST['action'] == 'GETNAME') {

    $INDUSTRY = new Industry($_POST['id']);
    $result = $INDUSTRY->name;

    echo json_encode(['data' => $result]);
    header('Content-type: application/json');
    exit();
}