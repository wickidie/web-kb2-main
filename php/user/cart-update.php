<?php
    require 'session-users.inc.php';

    $cart_id = $_GET['cart_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_GET['quantity'];
    
    $sql = "UPDATE `cart` SET `quantity`=";
    
    if (mysqli_query($conn, $sql)) {
        if (unlink($img_path)) {
            echo "              
            <script type='text/javascript'>
            alert('Cart ID $cart_id has been updated');
            location='cart.php';
            </script>";
        }else{
            echo "not found";
        }
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>