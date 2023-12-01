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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>