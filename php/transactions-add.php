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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
        include_once 'db-connect.inc.php';

        $quantity = $_POST['quantity'];
        $product_id = $_GET['product_id'];
        $transaction_total = 11.11;

        $sql = "SET foreign_key_checks = 0;";
        
        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        $sql = "INSERT INTO `transactions`(`transaction_date`, `transaction_total`, `user_id`) VALUES (CURRENT_DATE(), (SELECT product_price from products WHERE product_id = $product_id) * $quantity, $user_id);";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        $sql = "INSERT INTO `transaction_details`(`transaction_id`, `product_id`, `quantity`, `product_price`) VALUES ((LAST_INSERT_ID()), $product_id, $quantity, (SELECT product_price from products WHERE product_id = $product_id));";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        $sql = "SET foreign_key_checks = 1;";
        
        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn) ;
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>