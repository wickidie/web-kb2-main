<?php
    require 'session-users.inc.php';
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phonenum = $_POST['phone_number'];

    $sql = "UPDATE users SET 
            username = '$username', 
            email = '$email',
            first_name = '$first_name',
            last_name = '$last_name',
            address = '$address',
            phone_number = '$phonenum'
            WHERE user_id = '$user_id';";

    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        window.location.href = 'profile.php?user_id=" . $user_id . "'
        </script>";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>