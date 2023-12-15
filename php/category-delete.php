<?php
    require 'session-admin.inc.php';

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
