<?php
session_start();
session_destroy();
echo "              
<script type='text/javascript'>
alert('You have been logged out');
location='login-form.php';
</script>";
?>