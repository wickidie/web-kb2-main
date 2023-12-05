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


    // $sql = "DELETE FROM products WHERE product_id = '$product_id';SET foreign_key_checks = 1;";
    // $sql = "SET foreign_key_checks = 0;";
    
    // if (mysqli_query($conn, $sql)) {
    //     echo "              
    //     <script type='text/javascript'>
    //     alert('Product ID $product_id has been deleted');
    //     location='products.php';
    //     </script>";
    // } else {
    //     echo "Error deleting record: " . mysqli_error($conn);
    // }
    
    $sql = "DELETE FROM products WHERE product_id = '$product_id';";
    
    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Product ID $product_id has been deleted');
        location='products.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // $sql = "SET foreign_key_checks = 1;";
    
    // if (mysqli_query($conn, $sql)) {
    //     echo "              
    //     <script type='text/javascript'>
    //     alert('Product ID $product_id has been deleted');
    //     location='products.php';
    //     </script>";
    // } else {
    //     echo "Error deleting record: " . mysqli_error($conn);
    // }

    mysqli_close($conn);
?>