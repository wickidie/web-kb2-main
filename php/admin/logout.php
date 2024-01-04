<?php
    session_start();
    session_destroy();

    echo "<script type='text/javascript'>
    location='login-form.php';
    </script>";
?>