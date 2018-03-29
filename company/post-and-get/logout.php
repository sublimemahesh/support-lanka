<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

$COMPANY = new Company(NULL);

if ($COMPANY->logOut()) {
    header('Location: ../login.php');
} else {
    header('Location: ./?error=2');
}

