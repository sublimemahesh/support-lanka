<?php

include_once(dirname(__FILE__) . '/Setting.php');
include_once(dirname(__FILE__) . '/Helper.php');
include_once(dirname(__FILE__) . '/Upload.php');
include_once(dirname(__FILE__) . '/Database.php');
include_once(dirname(__FILE__) . '/User.php');
include_once(dirname(__FILE__) . '/Message.php');
include_once(dirname(__FILE__) . '/Validator.php');
include_once(dirname(__FILE__) . '/Member.php');
include_once(dirname(__FILE__) . '/City.php');
include_once(dirname(__FILE__) . '/District.php');
include_once(dirname(__FILE__) . '/Industry.php');
include_once(dirname(__FILE__) . '/Skill.php');
include_once(dirname(__FILE__) . '/Qualification.php');
include_once(dirname(__FILE__) . '/Education.php');
include_once(dirname(__FILE__) . '/SkillDetail.php');
include_once(dirname(__FILE__) . '/Experience.php');
include_once(dirname(__FILE__) . '/Portfolio.php');
include_once(dirname(__FILE__) . '/PortfolioPhoto.php');
include_once(dirname(__FILE__) . '/Award.php');
include_once(dirname(__FILE__) . '/Company.php');
include_once(dirname(__FILE__) . '/Vacancy.php');
include_once(dirname(__FILE__) . '/MessageRequest.php');
include_once(dirname(__FILE__) . '/Search.php');
include_once(dirname(__FILE__) . '/FeedBack.php');
include_once(dirname(__FILE__) . '/Sub-skill.php');


function dd($data) {
    var_dump($data);
    exit();
}

function redirect($url) {
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
    exit();
}
