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

    $sqlTransactionId = "SELECT transaction_id FROM transactions;";
    $result = mysqli_query($conn, $sqlTransactionId);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $transaction_id = $row['transaction_id'];
        }
    }

    $sql = "SELECT c.cart_id, c.created_at, c.user_id, c.quantity, c.product_id, p.product_price FROM cart c JOIN products p ON c.product_id = p.product_id WHERE user_id = $user_id;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $quantity = $row['quantity'];
            $product_price = $row['product_price'];
            $product_id = $row['product_id'];

            $sql_insert = "INSERT INTO `transaction_details`(`quantity`, `product_price`, `transaction_id`, `product_id`) VALUES ('$quantity', '$product_price', '$transaction_id', '$product_id')";
            mysqli_query($conn, $sql_insert);
        }
    }

    

    mysqli_close($conn) ;
?>