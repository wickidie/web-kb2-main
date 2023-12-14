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