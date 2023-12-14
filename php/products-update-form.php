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
    $product_id = $_GET['product_id'];
    $sql = "SELECT product_id, product_name, product_description, product_price, product_img, p.category_id, c.category_name FROM products p JOIN product_category c ON p.category_id = c.category_id WHERE product_id = $product_id";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $name = $row['product_name'];
    $description = $row['product_description'];
    $price = $row['product_price'];
    $image = $row['product_img'];
    $category = $row['category_id'];

    $sql = "SELECT category_name FROM product_category";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <style>
    body,
    html {
        height: 100%;
    }
    </style>
</head>

<body data-bs-theme="dark">
    <main class="h-100">
        <div class="d-flex flex-column justify-content-center align-items-center h-100" style="z-index: 999">
            <form class="needs-validation" action="products-update.php" method="post" enctype="multipart/form-data"
                novalidate>
                <h2><b>Product ID <?php echo $product_id ?> Update</b></h2>
                <p>This form is used to update user data!</p>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" <?php echo "value='$name'" ?>
                        placeholder="name" required pattern=".{5,}" title="Password must be at least 5 characters">
                    <label for="password_input"><strong>Name</strong></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="description" name="description"
                        <?php echo "value='$description'" ?> placeholder="description" required>
                    <label for="confirm_password"><strong>Description</strong></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="price" name="price" <?php echo "value='$price'" ?>
                        placeholder="123.69" required pattern=".{5,}" title="Password must be at least 5 characters">
                    <label for="password_input"><strong>Price</strong></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="image" name="image" placeholder="img_avatar1.png"
                        required>
                    <label for="confirm_password"><strong>Current image : <?php echo $image ?></strong></label>
                </div>
                <div class="col">
                    <div>
                        <label for="name" class="col form-label">Category</label>
                    </div>
                    <?php
                                echo "<select class='col mb-3' name='category'>"; 
                                while($category_row = mysqli_fetch_assoc($result)) {
                                    if ($category_row['category_name'] == $row['category_name']) {
                                        echo "<option value=" .  $row['category_name'] . ">" . $row['category_name'] . "</option>";
                                    }
                                }
                                $sql = "SELECT category_name FROM product_category";
                                $result = mysqli_query($conn, $sql);
                                while($category_row = mysqli_fetch_assoc($result)) {
                                    if ($category_row['category_name'] != $row['category_name']) {
                                        echo "<option value=" .  $category_row['category_name'] . ">" . $category_row['category_name'] . "</option>";
                                    }
                                }
                                echo "</select>";
                            ?>
                </div>
                <div class='text-center btn-group w-100'>
                    <button type='submit' class='btn btn-primary' name='product_id' value='$product_id'>Update</button>
                    <button type='submit' class='btn btn-danger' onclick='history.back()'>Close</button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>