<?php
    require 'session-admin.inc.php';

    $image_file = $_FILES['image'];
    $file_name = $image_file['name'];
    $file_temp = $image_file['tmp_name'];
    $file_size = $image_file['size'];
    $file_error = $image_file['error'];
    $file_type = $image_file['type'];

    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    echo $file_ext;
    $upload_location = "../asset/payment/";

    $allowed_ext = array('jpg', 'jpeg', 'png');
    $max_size = 10000000; // In Byte

    if (in_array($file_ext, $allowed_ext)) {
        if ($file_error === 0) {
            if ($file_size < $max_size) {
                $new_file = $upload_location . $file_name;
                move_uploaded_file($file_temp, $new_file);
            }else{
                echo "File too chongky";
            }
        }
    }else{
        echo "Your filetype is blacklisted";
    }
    
    if (isset($_POST['name']) && isset($_POST['price'])) {

        if ($_POST['name'] != "" || $_POST['price'] != "") {
            $name = $_POST['name'];
            $desc = $_POST['description'];
            $price = $_POST['price'];
            $cat = $_POST['category'];
            
            $sql = "INSERT INTO products (product_name, product_description, product_price, product_img, category_id)
            VALUES ('$name', '$desc', '$price', '$file_name', '$cat')";

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