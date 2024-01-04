<?php
    include_once 'db-connect.inc.php';
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if (isset($username) && isset($password)) {
        if (!empty($username) && !empty($password)) {
            $sql = "SELECT * FROM admin WHERE username = '$username' && password = '$password'";
            if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
                session_start();
                $getUserId = "SELECT admin_id FROM admin WHERE username = '$username'";
                $user_id = mysqli_query($conn, $getUserId);
                $row = mysqli_fetch_assoc($user_id);
                $_SESSION['admin_id'] = $row['admin_id'];
                header('Location: users.php');
            } else {
                    echo "              
                    <script type='text/javascript'>
                    alert('Failed2');
                    location='login-form.php';
                    </script>";
            }
        } else {
                echo "              
                <script type='text/javascript'>
                alert('Failed3');
                location='login-form.php';
                </script>";
        }
    }
    mysqli_close($conn);
?>