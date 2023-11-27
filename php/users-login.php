<?php
    include_once 'db-connect.inc.php';
    $userID = $_POST['userID'];
    $password = md5($_POST['password']);
    if (isset($userID) && isset($password)) {
    if (!empty($userID) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE userID = '$userID' && passcode = '$password'";
        if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
            session_start();
            $_SESSION['userID'] = $userID;
            header('Location: users-logged.php');
        } else {
            echo "              
            <script type='text/javascript'>
            alert('Failed');
            location='login-form.php';
            </script>";
        }
    } else {
        echo "              
        <script type='text/javascript'>
        alert('Failed');
        location='login-form.php';
        </script>";
    }
    } else {
        echo "              
        <script type='text/javascript'>
        alert('Failed');
        location='login-form.php';
        </script>";
    }
    mysqli_close($conn);
?>