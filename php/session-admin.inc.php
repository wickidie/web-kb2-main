<?php
    session_start();
    include_once 'db-connect.inc.php';
    $admin_id = $_SESSION['admin_id'];
    if (isset($admin_id) && !empty($admin_id)) {
    } else {
        echo "              
        <script type='text/javascript'>
        alert('You must login first');
        location='login-form.php';
        </script>";
    }
?>