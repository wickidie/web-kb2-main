<?php
    require 'session-users.inc.php';

    $transaction_id = $_GET['transaction_id'];
    
    $sql = "SELECT t.transaction_id, td.quantity, td.product_id FROM transactions t
    JOIN transaction_details td
    WHERE t.transaction_id = $transaction_id;";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $quantity = $row['quantity'];
            $product_id = $row['product_id'];
            $sql_prod = "SELECT * FROM products WHERE product_id = $product_id";
            $result_prod = mysqli_query($conn, $sql_prod);
            $prod = mysqli_fetch_assoc($result_prod);
            $sold = $prod['sold'];

            $update = "UPDATE `products` SET `sold` = $sold - $quantity WHERE `product_id` = $product_id";
            $res = mysqli_query($conn, $update);
        }
    }
    
    $sql = "UPDATE `users` SET `purchase` = `purchase` - 1 WHERE user_id = $user_id";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    $sql = "DELETE FROM transactions WHERE transaction_id = '$transaction_id';";

    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Transaction ID $transaction_id has been deleted');
        location='order-status.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>