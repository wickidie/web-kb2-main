<?php
    require 'session-users.inc.php';

    $cart_id = $_GET['cart_id'];
    
    $sql = "DELETE FROM cart WHERE cart_id = '$cart_id';";
    
    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Cart ID $cart_id has been deleted');
        location='cart.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>