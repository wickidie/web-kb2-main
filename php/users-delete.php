<?php
    session_start();
    include_once 'db-connect.inc.php';
    $user_id = $_SESSION['user_id'];
    if (isset($user_id) && !empty($user_id)) {
    } else {
        echo "              
        <script type='text/javascript'>
        alert('You must login first');
        location='login-form.php';
        </script>";
    }
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
