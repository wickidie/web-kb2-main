<?php
    require 'session-admin.inc.php';

    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];

    $sql = "UPDATE product_category SET category_name = '$category_name' WHERE category_id = '$category_id';";

    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Category ID $category_id has been updated.');
        location='products-category.php';
        </script>";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>