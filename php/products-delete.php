<?php
    session_start();
    include_once 'db-connect.inc.php';
    $user_id = $_SESSION['user_id'];
    if (isset($user_id) && !empty($user_id)) {
        echo "              
        <script type='text/javascript'>
        alert('$user_id');
        location='products.php';
        </script>";
    } else {
        echo "              
        <script type='text/javascript'>
        alert('You must login first');
        location='login-form.php';
        </script>";
    }
    $product_id = $_GET['product_id'];
    
    $product_img = mysqli_fetch_assoc(mysqli_query($conn, "SELECT product_img FROM products WHERE product_id = '$product_id';"));
    $img_path = "../asset/" . $product_img['product_img'];
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