<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5 | User Logged</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
        include_once 'db-connect.inc.php';
        $product_id = $_GET['product_id'];


        // $sql = "DELETE FROM products WHERE product_id = '$product_id';SET foreign_key_checks = 1;";
        $sql = "SET foreign_key_checks = 0; DELETE FROM products WHERE product_id = '$product_id';";
        
        if (mysqli_query($conn, $sql)) {
            echo "              
            <script type='text/javascript'>
            alert('Product ID $product_id has been deleted');
            location='products.php';
            </script>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        
        $sql = "DELETE FROM products WHERE product_id = '$product_id';";
        
        if (mysqli_query($conn, $sql)) {
            echo "              
            <script type='text/javascript'>
            alert('Product ID $product_id has been deleted');
            location='products.php';
            </script>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        $sql = "SET foreign_key_checks = 1;";
        
        if (mysqli_query($conn, $sql)) {
            echo "              
            <script type='text/javascript'>
            alert('Product ID $product_id has been deleted');
            location='products.php';
            </script>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    ?>
</body>

</html>