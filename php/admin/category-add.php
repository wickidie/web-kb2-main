<?php
    require 'session-admin.inc.php';
    
    if (isset($category_name)) {
        if ($category_name != "") {
            $sql = "INSERT INTO `product_category`(`category_name`)
            VALUES ('$category_name')";

            if (mysqli_query($conn, $sql)) {
                echo "              
                <script type='text/javascript'>
                alert('Your category has been created');
                location='products-category.php';
                </script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }   
    } else {
        echo "              
        <script type='text/javascript'>
        alert('Failed to create category!');
        location='products-category.php';
        </script>";
    }

    mysqli_close($conn) ;
?>