<?php

include_once(dirname(__FILE__) . '/../class/include.php');

if ($_POST['action'] == 'GETPORTFOLIOPHOTOSBYMEMBER') {

    $PortfolioPhoto = new PortfolioPhoto(NULL);

    $result = $PortfolioPhoto->getPortfolioPhotosById($_POST["portfolio"]);

    echo json_encode($result);
    header('Content-type: application/json');
    exit();
}
