<?php
    session_start();
    include_once 'db-connect.inc.php';
    $user_id = $_SESSION['user_id'];
    if (isset($user_id) && !empty($user_id)) {
        $transaction_id = $_POST['transaction_id'];
        $status = $_POST['status'];
        $sql = "UPDATE transactions SET status='$status' WHERE transaction_id='$transaction_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_query($conn, $sql)) {
            echo "              
            <script type='text/javascript'>
            alert('Status $transaction_id updated!');
            location='transactions.php';
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "              
        <script type='text/javascript'>
        alert('You must login first');
        location='login-form.php';
        </script>";
    }
?>
