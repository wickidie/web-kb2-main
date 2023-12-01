<?php
    include_once 'db-connect.inc.php';

    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_file = $_FILES['image'];
    $category = $_POST['category'];

    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $file_size = $_FILES['image']['size'];
    $file_error = $_FILES['image']['error'];
    $file_type = $_FILES['image']['type'];

    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    echo $file_ext;
    $upload_location = "../asset/";

    $allowed_ext = array('jpg', 'jpeg', 'png');
    $max_size = 10000;

    if (in_array($file_ext, $allowed_ext)) {
        if ($file_error === 0) {
            if ($file_size < $max_size) {
                $new_file = $upload_location . $img_file;
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