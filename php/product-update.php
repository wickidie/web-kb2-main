<?php
    include_once 'db-connect.inc.php';

    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $category = $_POST['category'];

    $sql = "UPDATE products SET 
            product_name = '$name',
            product_description = '$description',
            product_price = '$price',
            product_img = '$image',
            product_category = '$category'
            WHERE product_id = '$product_id';";

    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Product ID $product_id has been updated.');
        location='products.php';
        </script>";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>