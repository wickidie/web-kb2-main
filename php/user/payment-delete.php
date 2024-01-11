<?php
    require 'session-users.inc.php';
    
    $transaction_id = $_GET['transaction_id'];
    $sql = "SELECT payment FROM transactions WHERE transaction_id = '$transaction_id';";
    $result = mysqli_query($conn, $sql);
    $product_img = mysqli_fetch_assoc($result);
    
    $img_location = "../../asset/img/payment/";
    $old_image = $img_location . $product_img['payment'];

    if (unlink($old_image)) {
    }else{
        echo "No Image Found";
    }
    
    if (isset($transaction_id)) {
        $sql = "UPDATE transactions SET payment = NULL WHERE transaction_id = $transaction_id;";

        if (mysqli_query($conn, $sql)) {
            echo "              
            <script type='text/javascript'>
            alert('Your payment has been deleted!');
            location='order-status.php';
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
    } else {
        echo "              
        <script type='text/javascript'>
        alert('Failed to delete!');
        location='order-status.php';
        </script>";
    }

    mysqli_close($conn) ;
?>