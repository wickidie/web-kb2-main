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

    $quantity = $_POST['quantity'];
    $product_id = $_GET['product_id'];
    $transaction_total = 11.11;

    $sql = "SET foreign_key_checks = 0;";
    
    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    $sql = "INSERT INTO `transactions`(`transaction_date`, `transaction_total`, `user_id`) VALUES (CURRENT_DATE(), (SELECT product_price from products WHERE product_id = $product_id) * $quantity, $user_id);";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $sql = "INSERT INTO `transaction_details`(`transaction_id`, `product_id`, `quantity`, `product_price`) VALUES ((LAST_INSERT_ID()), $product_id, $quantity, (SELECT product_price from products WHERE product_id = $product_id));";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $sql = "SET foreign_key_checks = 1;";
    
    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Product ID $product_id has been purchased');
        location='products.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn) ;
?>