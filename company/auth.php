<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!Company::authenticate()) {
    redirect('login.php');
}