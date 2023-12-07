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
    $transaction_detail_id = $_GET['transaction_detail_id'];


    // $sql = "DELETE FROM products WHERE transaction_id = '$transaction';SET foreign_key_checks = 1;";
    $sql = "SET foreign_key_checks = 0;";
    
    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Transaction Details ID $transaction_detail_id has been deleted');
        location='transaction-details.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    
    $sql = "DELETE FROM transaction_details WHERE transaction_detail_id = '$transaction_detail_id';";
    
    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Transaction Details ID $transaction_detail_id has been deleted');
        location='transaction-details.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    $sql = "SET foreign_key_checks = 1;";
    
    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Transaction Details ID $transaction_detail_id has been deleted');
        location='transaction-details.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>