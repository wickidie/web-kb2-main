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
    
    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['img'])) {

        if ($_POST['name'] != "" || $_POST['price'] != "" || $_POST['img']) {
            $name = $_POST['name'];
            $desc = $_POST['description'];
            $price = $_POST['price'];
            $img = $_POST['img'];
            $cat = $_POST['category'];
            
            $sql = "INSERT INTO products (product_name, product_description, product_price, product_img, product_category)
            VALUES ('$name', '$desc', '$price', '$img', '$cat')";

            if (mysqli_query($conn, $sql)) {
                echo "              
                <script type='text/javascript'>
                alert('Your product has been added!');
                location='products.php';
                </script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
            
        } else {
            echo "              
            <script type='text/javascript'>
            alert('Failed to add product!');
            location='products.php';
            </script>";
        }
    } else {
        echo "              
        <script type='text/javascript'>
        alert('Failed to add product!');
        location='products.php';
        </script>";
    }

    mysqli_close($conn) ;
?>