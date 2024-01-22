<?php
    require 'session-admin.inc.php';

    $product_id = $_GET['product_id'];
    
    $product_img = mysqli_fetch_assoc(mysqli_query($conn, "SELECT product_img FROM products WHERE product_id = '$product_id';"));
    $img_path = "../../asset/img/product/" . $product_img['product_img'];
    $sql = "DELETE FROM products WHERE product_id = '$product_id';";
    
    if (mysqli_query($conn, $sql)) {
        if (unlink($img_path)) {
            echo "              
            <script type='text/javascript'>
            alert('Product ID $product_id has been deleted');
            location='products.php';
            </script>";
        }else{
            echo "No Image Found";
        }
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>