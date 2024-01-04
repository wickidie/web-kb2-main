<?php
    require 'session-admin.inc.php';

    $pastUser = $_POST['pastUser'];
    $newPassword = md5($_POST['newPassword']);
    
    $sql = "UPDATE users SET password = $newPassword WHERE user_id = '$pastUser';";

    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('$pastUser password was updated.');
        location='users.php';
        </script>";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>