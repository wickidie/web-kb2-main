<?php
    session_start();
    include_once 'db-connect.inc.php';
    include_once 'web-kb2.inc.php';
    $user_id = $_SESSION['user_id'];
    if (isset($user_id) && !empty($user_id)) {
    } else {
        alertToLocation("login-form", "AYE");
    }
?>