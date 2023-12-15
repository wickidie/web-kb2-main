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
    $category_id = $_GET['category_id'];

    $sql = "DELETE FROM product_category WHERE category_id = '$category_id'";

    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Category ID $category_id was deleted');
        location='products-category.php';
        </script>";
    } else {
    echo "Error deleting record: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
?>
