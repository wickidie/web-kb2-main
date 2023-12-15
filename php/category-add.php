<?php
    session_start();
    include_once 'db-connect.inc.php';
    $user_id = $_SESSION['user_id'];
    $category_name = $_POST['category_name'];
    if (isset($user_id) && !empty($user_id)) {
    } else {
        echo "              
        <script type='text/javascript'>
        alert('You must login first');
        location='login-form.php';
        </script>";
    }
    
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