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

    $sql = "SELECT * FROM product_category";
    $result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
            <form class="needs-validation" action="category-add.php" method="post" enctype="multipart/form-data" novalidate>
                <h2 class="mb-3"><b>Add Product</b></h2>
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control form-control-sm" id="category_name" name="category_name"
                        placeholder="Drink, food, cloth, etc" aria-label="Name" aria-describedby="nameph" required>
                </div>
                <div class="justify-content-center justify-content-sm-end">
                    <div class="text-end">
                        <button class="btn btn-danger" onclick="history.back()">Discard</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>