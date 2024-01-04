<?php
    require 'session-admin.inc.php';
    $user_id = $_GET['user_id'];

    $sql = "DELETE FROM users WHERE user_id = '$user_id'";

    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('$user_id was deleted');
        location='users.php';
        </script>";
    } else {
    echo "Error deleting record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>
