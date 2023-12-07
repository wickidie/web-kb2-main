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
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image_file = $_FILES['image'];
    $file_name = $image_file['name'];
    $file_temp = $image_file['tmp_name'];
    $file_size = $image_file['size'];
    $file_error = $image_file['error'];
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed_ext = array('jpg', 'jpeg', 'png');
    $max_size = 10000000; // In Byte
    $product_img = mysqli_fetch_assoc(mysqli_query($conn, "SELECT product_img FROM products WHERE product_id = '$product_id';"));
    $img_location = "../asset/";
    $old_image = $img_location . $product_img['product_img'];

    if (unlink($old_image)) {
    }else{
        echo "No Image Found";
    }
    
    if (in_array($file_ext, $allowed_ext)) {
        if ($file_error === 0) {
            if ($file_size < $max_size) {
                $new_file = $img_location . $file_name;
                move_uploaded_file($file_temp, $new_file);
            }else{
                echo "File too chongky";
            }
        }
    }else{
        echo "Your filetype is blacklisted";
    }

    $sql = "UPDATE products SET 
            product_name = '$name',
            product_description = '$description',
            product_price = '$price',
            product_img = '$file_name',
            product_category = '$category'
            WHERE product_id = '$product_id';";

    if (mysqli_query($conn, $sql)) {
        echo "              
        <script type='text/javascript'>
        alert('Product ID $product_id has been updated. $file_ext');
        location='products.php';
        </script>";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>