<?php
    session_start();
    include_once 'db-connect.inc.php';
    include_once 'web-kb2.inc.php';
    $admin_id = $_SESSION['admin_id'];
    if (isset($admin_id) && !empty($admin_id)) {
    } else {
        alertToLocation("login-form", "AYE");
    }
?>