<?php
    require 'session-users.inc.php';

    $quantity = 1;
    $product_id = $_GET['product_id'];
    $sql = "INSERT INTO `cart`(`created_at`, `user_id`, `quantity`, `product_id`) VALUES (CURRENT_TIMESTAMP, $user_id, $quantity, $product_id);";
    
    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        // alert('Product ID $product_id has been added to cart');
        location='products.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn) ;
?>