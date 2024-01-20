<?php
    require 'session-users.inc.php';
    
    $transaction_id = $_GET['transaction_id'];
    $image_file = $_FILES['image'];
    $file_name = $image_file['name'];
    $file_temp = $image_file['tmp_name'];
    $file_size = $image_file['size'];
    $file_error = $image_file['error'];
    $file_type = $image_file['type'];

    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $upload_location = "../../asset/img/payment/";

    $allowed_ext = array('jpg', 'jpeg', 'png');
    $max_size = 10000000; // In Byte

    if (in_array($file_ext, $allowed_ext)) {
        if ($file_error === 0) {
            if ($file_size < $max_size) {
                $file_name = uniqid('payment_', true) . "." . $file_ext;
                $new_file = $upload_location . $file_name;
                move_uploaded_file($file_temp, $new_file);
                echo $file_name;
            }else{
                echo "File too chongky";
            }
        }
    }else{
        echo "Your filetype is blacklisted";
    }
    
    if (isset($transaction_id)) {
        $sql = "UPDATE transactions SET payment = '$file_name' WHERE transaction_id = $transaction_id;";

        if (mysqli_query($conn, $sql)) {
            echo "              
            <script type='text/javascript'>
            // alert('Your payment has been added!');
            location='order-status.php';
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    } else {
        echo "              
        <script type='text/javascript'>
        alert('Failed to upload!');
        location='order-status.php';
        </script>";
    }

    mysqli_close($conn) ;
?>