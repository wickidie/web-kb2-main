<?php
    include_once 'db-connect.inc.php';

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        if ($_POST['password'] != $_POST['confirm_password']) {
            header('location: regist-form.php');
        } else {
            if ($_POST['username'] != "" || $_POST['password'] != "" || $_POST['email'] != "") {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $email = $_POST['email'];
                
                $sql = "INSERT INTO users (username, password, email, first_name, last_name, address, phone_number, purchase)
                VALUES ('$username', '$password', '$email', 'unset', 'unset', 'unset', 'unset', 0)";

                if (mysqli_query($conn, $sql)) {
                    echo "              
                    <script type='text/javascript'>
                    alert('Your account has been created');
                    location='login-form.php';
                    </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "              
                <script type='text/javascript'>
                alert('Failed to create record!');
                location='regist-form.php';
                </script>";
            }
        }
    } else {
        echo "              
        <script type='text/javascript'>
        alert('Failed to create record!');
        location='regist-form.php';
        </script>";
    }

    mysqli_close($conn) ;
?>