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

    $sql = "SELECT c.cart_id, c.created_at, c.user_id, c.quantity, c.product_id, p.product_price FROM cart c JOIN products p ON c.product_id = p.product_id WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    $transaction_total = 0;

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $transaction_total += $row['quantity'] * $row['product_price'];
        }
    }

    $sql = "INSERT INTO `transactions`(`transaction_date`, `transaction_total`, `status`,`user_id`) VALUES (CURRENT_DATE(), $transaction_total, 'Pending', $user_id);";

    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Item has been purchased');
        location='cart.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn) ;
?>